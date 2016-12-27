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
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {//echo "exists\n";
        //$this->container[$offset]=new Dictionary();
        return array_key_exists($offset,$this->container);
    }

    /**
     * Offset to retrieve
     * @param mixed $offset The offset to retrieve.
     * @return mixed Can return all value types.
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
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
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
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {echo "unset\n";
        unset($this->container[$offset]);
    }
}