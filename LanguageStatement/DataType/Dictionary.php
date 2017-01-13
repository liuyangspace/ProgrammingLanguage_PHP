<?php
/**
 * 字典 参见 SplObjectStorage (LanguageExtension/SPL/DataStructure/SplObjectStorage)
 * Dictionary 特征：
 *  键值对结构($key=>$value)，
 *  用法类似Array ,可foreach,但key可以是多种类型，不会像array key一样转换
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;


class Dictionary extends \SplObjectStorage implements \ArrayAccess,\Iterator,\Countable
{
    //数据存储容器
    protected $key = [];
    protected $value = [];

    //索引自动填充 计数器
    protected $indexAccumulator=0;

    //迭代指针
    protected $pointer = 0;

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
                $this->key[]=$key;
                $this->value[]=$tmpValue;
            }
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    // Countable
    public function count()
    {
        return count($this->key);
    }

    // ArrayAccess
    /**
     * Whether a offset exists
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return in_array($offset,$this->key,true);
    }

    /**
     * Offset to retrieve 建议使用 set()
     * offsetGet 会对 key做一些类型转换（详见DataType/ArrayClass）
     * @param mixed $offset The offset to retrieve.
     * @return mixed Can return all value types.
     */
    public function get($key)
    {
        $index = array_search($key,$this->key,true);
        if($index!==false){
            return $this->value[$index];
        }else{
            throw new \Exception(sprintf("Undefined index : %s",$key));
        }
    }
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Offset to set 建议使用 set()
     * offsetSet 另一个值不可用，那么 offset 参数将被设置为 NULL
     * offsetSet 会对 key做一些类型转换（详见DataType/ArrayClass）
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
     */
    public function set($key, $value)
    {
        $index = array_search($key,$this->key,true);
        if($index){
            $this->value[$index]=$value;
        }else{
            $this->key[]=$key;
            $this->value[]=$value;
        }
    }
    public function offsetSet($offset, $value)
    {
        $index = array_search($offset,$this->key,true);
        if($index){
            $this->value[$index]=$value;
        }else{
            if($offset!==null){
                $this->key[]=$offset;
                $this->value[]=$value;
            }else{
                $index=$this->indexAccumulator+1;
                $this->key[]=$index;
                $this->value[]=$value;
            }
        }
    }

    /**
     * Offset to unset
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        $index = array_search($offset,$this->key,true);
        if($index){
            unset($this->key[$index]);
            unset($this->value[$index]);
        }
    }

    // Iterator
    public function current()
    {
        $i=0;
        foreach($this->value as $value){
            $j=$i;
            $i++;
            if($j<$this->pointer){
                continue;
            }elseif($j==$this->pointer){
                return $value;
            }else{
                break;
            }

        }
        //throw new \Exception(sprintf("Error pointer !"));
        return null;
    }
    //
    public function key()
    {
        $i=0;
        foreach($this->key as $key){
            $j=$i;
            $i++;
            if($j<$this->pointer){
                continue;
            }elseif($j==$this->pointer){
                return $key;
            }else{
                break;
            }
        }
        throw new \Exception(sprintf("Error pointer !"));
    }
    //
    public function next()
    {
        $this->pointer++;
    }
    //
    public function rewind()
    {
        $this->pointer=0;
    }
    //
    public function valid()
    {
        return $this->pointer<count($this->key);
    }

    //
    public function __toString()
    {
        return json_encode(array_combine($this->key,$this->value),JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
    }

    /*
     * 打印
     * Array export( void )
     * @param void
     * @return
     */
    public function export()
    {
        return array_combine($this->key,$this->value);
    }
    public function __debugInfo()
    {
        return array_combine($this->key,$this->value);
    }
}