<?php
/**
 * SplDoublyLinkedList 双向链表
 */

namespace LanguageStatement\LanguageExtension\SPL\DataStructure;


class SplDoublyLinkedList extends \SplDoublyLinkedList implements \Iterator, \ArrayAccess, \Countable
{

    public function __construct(){parent::__construct();}

    // ArrayAccess
    public function offsetExists($index){return parent::offsetExists($index);}//
    public function offsetGet($index){return parent::offsetGet($index);}//
    public function offsetSet($index, $newval){parent::offsetSet($index, $newval);}
    public function offsetUnset($index){parent::offsetUnset($index);}

    // Iterator
    public function current(){return parent::current();}
    public function key(){parent::key();}
    public function rewind(){parent::rewind();}
    public function valid(){return parent::valid();}
    public function next(){parent::next();}//Move to next entry

    public function prev(){parent::prev();}//Move to previous entry

    // Countable
    public function count(){parent::count();}

    //
    public function serialize(){return parent::serialize();}
    public function unserialize($serialized){parent::unserialize($serialized);}

    //
    public function add($index,$newval){parent::add($index,$newval);}//Add/insert a new value at the specified index

    public function top(){return parent::top();}//
    public function bottom(){return parent::bottom();}//Peeks at the node from the beginning of the doubly linked list

    public function pop(){return parent::pop();}//Pops a node from the end of the doubly linked list
    public function push($value){parent::push($value);}//Pushes an element at the end of the doubly linked list

    public function shift(){return parent::shift();}//Shifts a node from the beginning of the doubly linked list
    public function unshift($value){parent::unshift($value);}//Prepends the doubly linked list with an element

    public function isEmpty(){return parent::isEmpty();}//Checks whether the doubly linked list is empty
    public function getIteratorMode(){return parent::getIteratorMode();}//Returns the mode of iteration

}