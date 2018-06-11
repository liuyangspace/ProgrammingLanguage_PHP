<?php
/**
 * 链表
 * list 特征：
 *  物理存储单元上非连续、非顺序
 *  顺序访问(区别于数组，字典的随机访问)线性排列,添加，删除，较快
 * 用例：
 *  $list=new LinkList('a');
 *  $list->setNext('b')->setValue('b1')
 *      ->setNext('c')->setValue('c1')
 *      ->setNext('d')->setValue('d1');
 * Reference:
 * SPL:
 * @see \SplDoublyLinkedList
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplDoublyLinkedList
 */

namespace LanguageStatement\DataType;

class LinkList
{
    // 本节点的值
    protected $value;
    // 指向下一节点的引用
    protected $next=null;

    /**
     * 构建
     * LinkList constructor.
     * @param null $value
     * @param LinkList|null $next
     */
    public function __construct($value=null,LinkList $next=null)
    {
        $this->value=$value;
        $this->next=$next;
    }

    /**
     * set value
     * void setValue( mixed $value )
     * @param mixed $value value
     * @return LinkList
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
     * @param LinkList $next next ListClass
     * @return LinkList
     */
    public function setNext(LinkList $next=null)
    {
        $this->next=$next;
        return $next;
    }

    /**
     * get next ListClass
     * ListClass getNext( void )
     * @param void
     * @return LinkList next ListClass
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