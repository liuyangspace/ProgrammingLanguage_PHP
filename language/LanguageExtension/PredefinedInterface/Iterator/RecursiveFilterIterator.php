<?php
/**
 * RecursiveFilterIterator
 * This extended FilterIterator allows a recursive iteration using RecursiveIteratorIterator that only shows those elements which have children.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveFilterIterator extends \RecursiveFilterIterator implements \OuterIterator, \RecursiveIterator // extends \FilterIterator
{
    public function __construct(\RecursiveIterator $iterator){parent::__construct($iterator);}//
    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//Return the inner iterator's children contained in a ParentIterator
    public function hasChildren(){return parent::hasChildren();}//Check whether the inner iterator's current element has children
    /* 继承的方法 */
    // RecursiveIterator
    /*abstract*/ public function accept(){return parent::accept();}//Check whether the current element of the iterator is acceptable
    // IteratorIterator
    // public function __construct(\Traversable $iterator){return parent::__construct($iterator);}// Creates an iterator from anything that is traversable
    // OuterIterator
    public function getInnerIterator(){return parent::getInnerIterator();}//Get the inner iterator.
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){parent::next();}//向前移动到下一个元素
    public function rewind(){parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效
}