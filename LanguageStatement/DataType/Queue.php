<?php
/**
 * 队列
 * Queue 特征：
 *  先进先出(FIFO)
 * 用例：
 *  建队：$queue = new Queue();$queue = new Queue([1,2,3]);
 *  入队：$queue->put(1);$queue->input(1);
 *  出队：$queue->pull();$queue->output();
 *  队长：$queue->count();count($queue)
 *  清队：$queue->clear();$queue->isEmpty();
 *  调试：$queue->export();var_dump($queue);
 *  类型变换：$queue->toArray();$queue->__toString();
 * Reference:
 *
 * SPL:
 * @see \SplQueue
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplQueue
 */

namespace LanguageStatement\DataType;

class Queue implements \Countable
{
    //  队列数据存储容器
    protected $container ;

    /**
     * 构建 队列
     * Queue __construct( mixed $var )
     * @param $var
     * @return Queue
     */
    public function __construct(Array $var=null)
    {
        $this->container = new \SplQueue();
        if($var===null){

        }else{
            foreach($var as $value){
                $this->container->push($value);
            }
        }
    }

    /**
     * 入队
     * void put( mixed $value )
     * @param $var
     * @return void
     */
    public function put($value)
    {
        $this->container->push($value);
    }
    public function input($value)
    {
        $this->container->push($value);
    }


    /**
     * 出队
     * mixed pull( void )
     * @param $var
     * @return mixed 弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function pull()
    {
        return $this->container->shift();
    }
    public function output()
    {
        return $this->container->shift();
    }


    /**
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->container = new \SplQueue();
    }

    /**
     * Checks whether the queue is empty.
     * @return bool
     */
    public function isEmpty()
    {
        return $this->container->isEmpty();
    }

    /**
     * 队长
     * int count( void )
     * @param void
     * @return int 队内的单元数
     */
    public function count()
    {
        return $this->container->count();
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
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        $arr=[];
        foreach($this->container as $value){
            $arr[]=$value;
        }
        return $arr;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray(),JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
    }
}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */