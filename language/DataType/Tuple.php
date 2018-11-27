<?php
/**
 * 元组
 * tuple 特征：
 *  类似于列表，下标为整数，仅能初始化，不能修改
 *  (SplFixedArray 参见 LanguageExtension/SPL/DataStructure/SplFixedArray)
 * 用例：
 *  $tuple=new Tuple([1,2,3,'a']);
 *  echo $tuple[0],
 *  // $tuple[1]=2; throw a exception
 * Reference:
 * SPL:
 * @see \SplFixedArray
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplFixedArray
 */

namespace LanguageStatement\DataType;


class Tuple extends \LanguageStatement\DataType\Iterator implements \ArrayAccess,\Countable
{

    /**
     * Tuple constructor.
     * @param array|null $var
     */
    public function __construct(Array $var=null)
    {
        parent::__construct($var);
    }

    /**
     * @param int $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->container->offsetGet($offset);
    }

    /**
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->container->offsetExists($offset);
    }

    /*
     * 不能赋值
     * void push( mixed $var )
     * @param $var
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        throw new \Exception('An invalid operation was attempted on the Tuple !');
    }

    /**
     * 元组长
     * int size( void )
     * @param void
     * @return int 元组内的单元数
     */
    public function count()
    {
        return $this->container->count();
    }

    /**
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
     * Offset to unset 不能删除
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        throw new \Exception('An invalid operation was attempted on the Tuple !');
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->container->toArray();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray(),JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
    }

}