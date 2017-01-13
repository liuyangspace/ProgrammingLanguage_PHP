<?php
/*
 * 链表 参见 SplDoublyLinkedList (LanguageExtension/SPL/DataStructure/SplDoublyLinkedList)
 * list 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

class ListClass
{

    protected $value;
    protected $next=null;

    /*
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
     * @return void
     */
    public function setValue($value=null)
    {
        $this->value=$value;
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
     * @return void
     */
    public function setNext(ListClass $next=null)
    {
        $this->next=$next;
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

    /*
     * 打印
     * Array export( void )
     * Array __debugInfo( void )
     * @param void
     * @return Array
     */
    public function export()
    {
        return $this->value;
    }
    public function __debugInfo()
    {
        return $this->value;
    }


}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */