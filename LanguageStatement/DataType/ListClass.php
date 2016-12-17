<?php
/*
 * 队列
 * list 特征：
 *  先进先出
 * Reference:
 *  http://php.net/manual/zh/language.types.boolean.php
 */

namespace LanguageStatement\DataType;

class ListClass implements \ArrayAccess
{
    //  队列数据存储容器
    protected $list = array();

    /*
     * 构建 队列
     * ListClass __construct( mixed $var )
     * @param $var
     * @return ListClass
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->list = array_values($var);
        }elseif(is_string($var)){
            $this->list = str_split($var);
        }elseif($var===null){
            $this->list = array();
        }else{
            throw new \Exception('"'.$var.'" is not a array or string !');
        }
    }

    /*
     * 入队
     * void put( mixed $var )
     * @param $var
     * @return void
     */

    public function clear(){
        $this->list = array();
    }

    /*
     * 出队
     * mixed put( void )
     * @param $var
     * @return 弹出队首的值,如果 array 为 空则返回 NULL。
     */

    public function size(){
        return count($this->list);
    }

    /*
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */

    public function __isset($name)
    {
        return count($this->list);
    }

    /*
     * 获取队列长度
     * int size( void )
     * @param $var
     * @return void
     */

    public function export(){
        var_dump($this->list);
    }

    public function __debugInfo()
    {
        var_dump($this->list);
    }

    /*
     * 打印
     * void clear( void )
     * @param $var
     * @return export
     */

    /**
     * Whether a offset exists
     * @param mixed $offset <p>
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return false;
    }

    /**
     * Offset to retrieve 出队
     * @param mixed $offset <p>
     * @return mixed Can return all value types.弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function offsetGet($offset)
    {
        return $this->pull();
    }

    public function pull(){
        return array_shift($this->list);
    }

    /**
     * Offset to set 入队
     * @param mixed $offset <p>
     * @param mixed $value <p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->put($value);
    }

    public function put($var){
        // array_push($this->list,$var);
        $this->list[]=$var;
    }

    /**
     * Offset to unset
     * @param mixed $offset <p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->list = array();
    }
    public function __unset($name)
    {
        $this->list = array();
    }
}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */