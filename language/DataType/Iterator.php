<?php
/**
 * 迭代器
 * Iterator 特征：
 *  实现了Iterator接口可用foreach遍历
 * 用例：
 *  $iterator=new Iterator([1,2,3]);
 *  foreach( $iterator as $v ){}
 * Reference:
 * SPL:
 * @see \Iterator
 * @see \SplFixedArray
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplFixedArray
 */

namespace LanguageStatement\DataType;

use LanguageStatement\LanguageExtension\SPL\DataStructure\SplFixedArray;

class Iterator implements \Iterator
{
    // 迭代指针
    protected $pointer=0;

    //数据存储容器
    protected $container;

    /**
     * 构建
     * Iterator __construct( mixed $var )
     * @param $var
     * @return Iterator
     */
    public function __construct(Array $var=null)
    {
        if($var===null){
            $this->container=new \SplFixedArray();
        }else{
            $this->container=SplFixedArray::fromArray(array_values($var));
            $this->pointer=0;
        }
    }

    /**
     * Return the current element
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->container->current();
    }

    /**
     * Move forward to next element
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->pointer++;
        $this->container->next();
    }

    /**
     * Return the key of the current element
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->container->key();
    }

    /**
     * Checks if current position is valid
     * @return boolean The return value will be casted to boolean and then evaluated.
     */
    public function valid()
    {
        return $this->container->valid();
    }

    /**
     * Rewind the Iterator to the first element
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->pointer=0;
        $this->container->rewind();
    }

}