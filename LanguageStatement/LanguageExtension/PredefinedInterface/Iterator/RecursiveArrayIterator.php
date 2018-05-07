<?php
/**
 * RecursiveArrayIterator SPL Iterator
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveArrayIterator extends \RecursiveArrayIterator implements \RecursiveIterator // extends \ArrayIterator
{

    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//Returns an iterator for the current entry if it is an array or an object.
    public function hasChildren(){return parent::hasChildren();}//Returns whether current entry is an array or an object.

    /* Inherits */
    // ArrayIterator
    public function __construct($array=[],$flags=0){return parent::__construct($array,$flags);}//

    public function setFlags($flags){parent::setFlags($flags);}//Set behaviour flags
    public function getFlags(){return parent::getFlags();}//Get the current flags.
    public function getArrayCopy(){return parent::getArrayCopy();}//Get array copy
    public function natsort(){parent::natsort();}//Sort the entries by values using "natural order" algorithm.
    public function natcasesort(){parent::natcasesort();}//Sort the entries by values using a case insensitive "natural order" algorithm.
    public function uasort($cmp_function){parent::uasort($cmp_function);}//Sort the entries by values using user defined function.
    public function uksort($cmp_function){parent::uksort($cmp_function);}//Sort the entries by key using user defined function.
    public function append($value){parent::append($value);}//Appends value as the last element.
    public function asort(){parent::asort();}//Sort array by values
    // ArrayAccess
    public function offsetExists($index){return parent::offsetExists($index);}//
    public function offsetGet($index){return parent::offsetGet($index);}
    public function offsetSet($index,$value){parent::offsetSet($index,$value);}//
    public function offsetUnset($index){parent::offsetUnset($index);}//
    // SeekableIterator
    public function seek($position){parent::seek($position);}//
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){parent::next();}//向前移动到下一个元素
    public function rewind(){parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效
    // Serializable
    public function serialize(){return parent::serialize();}
    public function unserialize($serialized){return parent::unserialize($serialized);}
    // Countable
    public function count(){return parent::count();}
}