<?php
/**
 * 链表
 * ( SplDoublyLinkedList 参见 LanguageExtension/SPL/DataStructure/SplDoublyLinkedList)
 * list 特征：
 *  顺序访问线性排列,添加，删除，较快
 * 用例：
 *  $list=new List('a');
 *  $list->setNext('b')->setValue('b1')
 *      ->setNext('c')->setValue('c1')
 *      ->setNext('d')->setValue('d1');
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

class ListClass
{
    // 本节点的值
    protected $value;
    // 指向下一节点的引用
    protected $next=null;

    /**
     * 构建
     * ListClass __construct( mixed $var. )
     * @param $var
     * @return ListClass
     */
    public function __construct($value=null,ListClass $next=null)
    {
        $this->value=$value;
        $this->next=$next;
    }

    /**
     * set value
     * void setValue( mixed $value )
     * @param mixed $value value
     * @return ListClass
     */
    public function setValue($value=null)
    {
        $this->value=$value;
        return $this;
    }

    /**
     * get value
     * mixed getValue( void )
     * @param void
     * @return mixed value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * set next ListClass
     * void setNext( ListClass $next )
     * @param ListClass $next next ListClass
     * @return ListClass
     */
    public function setNext(ListClass $next=null)
    {
        $this->next=$next;
        return $next;
    }

    /**
     * get next ListClass
     * ListClass getNext( void )
     * @param void
     * @return ListClass next ListClass
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * 打印
     * Array export( void )
     * Array __debugInfo( void )
     * @param void
     * @return mixed
     */
    public function export()
    {
        return ['this'=>$this->value,'next'=>$this->next];
    }
    public function __debugInfo()
    {
        return ['this'=>$this->value,'next'=>$this->next];
    }

}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */