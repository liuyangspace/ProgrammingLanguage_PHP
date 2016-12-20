<?php
/*
 * 迭代器
 * Iterator 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;


class Iterator implements \Iterator
{
    //应射 关系（函数）
    protected $pointer=null;

    //数据存储容器
    protected $container = [];

    /*
     * 构建
     * Iterator __construct( mixed $var )
     * @param $var
     * @return Iterator
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            foreach($var as $k=>$v){
                $this->container[] = [$k=>$v];
            }
            $pointer=0;
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        reset($this->container[$this->pointer]);
        list($key,$value)=each($this->container[$this->pointer]);
        return $value;
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        if($this->pointer+1>count($this->container)-1){
            $this->pointer++;
        }else{
            $this->pointer++;
        }
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        reset($this->container[$this->pointer]);
        list($key,$value)=each($this->container[$this->pointer]);
        return $key;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return array_key_exists($this->pointer,$this->container);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->pointer=0;
    }


}