<?php
/*
 * 映射
 * map 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

//图
class Map implements \ArrayAccess
{
    //应射 关系（函数）
    protected $mapFunction=null;

    //数据存储容器
    protected $container = [];

    /*
     * 构建
     * Map __construct( mixed $var. )
     * @param $var
     * @return Map
     */
    public function __construct($var=null,callable $func=null,$param=null)
    {var_dump($func);
        $this->setMapOperate($func,$param);
        if(is_array($var)){
            foreach($var as $key=>$value){
                $index=call_user_func($this->mapFunction,$key,$value,$param);
                $this->container[$index]=$value;
            }
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    public function setMapOperate(callable $func=null,$param=null)
    {
        if($func === null){
            $func=function($index){
                return $index;
            };
        }
        $this->mapFunction=$func;
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
    {
        return array_key_exists(call_user_func($this->mapFunction,$offset),$this->container);
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
    {
        if($this->offsetExists($offset)){
            return $this->container[call_user_func($this->mapFunction,$offset)];
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
    {
        $this->container[call_user_func($this->mapFunction,$offset)]=$value;
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
    {
        unset($this->container[call_user_func($this->mapFunction,$offset)]);
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
}