<?php
/*
 * 字典
 * Dictionary 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;


class Dictionary implements \ArrayAccess
{
    //数据存储容器
    protected $container = [];

    //索引自动填充 计数器
    protected $indexAccumulator=0;

    /*
     * 构建
     * Dictionary __construct( mixed $var. )
     * @param $var
     * @return Dictionary
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            foreach($var as $key=>$value){
                if(is_int($key) && $key>$this->indexAccumulator){
                    $this->indexAccumulator=$key;
                }
                $tmpValue=$value;
                if(is_array($value)){
                    $tmpValue=new Dictionary($value);
                }
                $this->container[$key]=$tmpValue;
            }
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    /*
     * 打印
     * Array export( void )
     * @param void
     * @return
     */
    public function export()
    {
        return $this->container;
    }
    public function __debugInfo()
    {
        return $this->container;
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {//echo "exists\n";
        //$this->container[$offset]=new Dictionary();
        return array_key_exists($offset,$this->container);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {//echo "get\n";
        if($this->offsetExists($offset)){
            return $this->container[$offset];
        }else{
            throw new \Exception('Undefined index : '.$offset);
        }
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {//echo "set\n";
        if($offset){
            $this->container[$offset]=$value;
        }else{
            $this->container[++$this->indexAccumulator]=$value;
        }
    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {echo "unset\n";
        unset($this->container[$offset]);
    }
}