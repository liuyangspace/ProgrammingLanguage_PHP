<?php
/**
 * RecursiveCachingIterator
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveCachingIterator extends \RecursiveCachingIterator implements \Countable, \ArrayAccess, \OuterIterator, \RecursiveIterator // extends \CachingIterator
{

    public function __construct(\Iterator $iterator,$flags=self::CALL_TOSTRING){parent::__construct($iterator,$flags);}

    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//The inner iterator's children, as a RecursiveCachingIterator.
    public function hasChildren(){return parent::hasChildren();}//TRUE if the inner iterator has children, otherwise FALSE

    /* Inherits */
    public function __toString(){return parent::__toString();}//Get the string representation of the current element.
    public function getCache(){return parent::getCache();}//Retrieve the contents of the cache.
    public function setFlags($flags){parent::setFlags($flags);}//Set the flags for the CachingIterator object.
    public function getFlags(){return parent::getFlags();}//Get the bitmask of the flags used for this CachingIterator instance.
    public function hasNext(){return parent::hasNext();}//Check whether the inner iterator has a valid next element
    // IteratorIterator
    // public function __construct(\Traversable $iterator){return parent::__construct($iterator);}// Creates an iterator from anything that is traversable
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){parent::next();}//向前移动到下一个元素
    public function rewind(){parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效
    // ArrayAccess
    public function offsetExists($index){return parent::offsetExists($index);}//
    public function offsetGet($index){return parent::offsetGet($index);}
    public function offsetSet($index,$value){parent::offsetSet($index,$value);}//
    public function offsetUnset($index){parent::offsetUnset($index);}//
    // Countable
    public function count(){return parent::count();}
}