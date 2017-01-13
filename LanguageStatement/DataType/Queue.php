<?php
/**
 * 队列
 * Queue 特征：
 *  先进先出
 * 用例：
 *  建队：$queue = new Queue();$queue = new Queue([1,2,3]);
 *  入队：$queue->put(1);$queue[]=1;
 *  出队：$queue->pull();$queue[0];
 *  队长：$queue->size();
 *  清队：$queue->clear();unset($queue);
 *  调试：$queue->export();var_dump($queue);
 *  类型变换：$queue->toArray();
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

class Queue implements \ArrayAccess
{
    //  队列数据存储容器
    protected $container = array();

    /**
     * 构建 队列
     * Queue __construct( mixed $var )
     * @param $var
     * @return Queue
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->container = array_values($var);
        }elseif(is_string($var)){
            $this->container = str_split($var);
        }elseif($var===null){
            $this->container = array();
        }else{
            throw new \Exception('"'.$var.'" is not a array or string !');
        }
    }

    /**
     * 入队
     * void put( mixed $var )
     * @param $var
     * @return void
     */
    public function put($var)
    {
        $this->container[] = $var;
    }
    public function offsetSet($offset, $value)
    {
        $this->container[] = $value;
    }

    /**
     * 出队
     * mixed pull( void )
     * @param $var
     * @return mixed 弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function pull()
    {
        return array_shift($this->container);
    }
    public function offsetGet($offset)
    {
        return array_shift($this->container);
    }

    /**
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->container = array();
    }

    /**
     * 队长
     * int size( void )
     * @param void
     * @return int 队内的单元数
     */
    public function size()
    {
        return count($this->container);
    }

    /**
     * 打印
     * Array export( void )
     * @param void
     * @return array
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
        $this->container = array();
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->container;
    }
}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */