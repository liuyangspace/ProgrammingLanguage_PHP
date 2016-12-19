<?php
/*
 * 队列
 * list 特征：
 *  先进先出
 * 用例：
 *  建队：$list = new ListClass();$list = new ListClass([1,2,3]);
 *  入队：$list->put(1);$list[]=1;
 *  出队：$list->pull();$list[0];
 *  队长：$list->size();
 *  清队：$list->clear();unset($list);
 *  调试：$list->export();var_dump($list);
 * Reference:
 *
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
    public function put($var)
    {
        $this->list[] = $var;
    }
    public function offsetSet($offset, $value)
    {
        $this->list[] = $value;
    }

    /*
     * 出队
     * mixed pull( void )
     * @param $var
     * @return 弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function pull()
    {
        return array_shift($this->list);
    }
    public function offsetGet($offset)
    {
        return array_shift($this->list);
    }

    /*
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->list = array();
    }

    /*
     * 队长
     * int size( void )
     * @param void
     * @return 队内的单元数
     */
    public function size()
    {
        return count($this->list);
    }

    /*
     * 打印
     * Array export( void )
     * @param void
     * @return
     */
    public function export()
    {
        return $this->list;
    }
    public function __debugInfo()
    {
        return $this->list;
    }

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
     * Offset to unset
     * @param mixed $offset <p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->list = array();
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->list;
    }
}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */