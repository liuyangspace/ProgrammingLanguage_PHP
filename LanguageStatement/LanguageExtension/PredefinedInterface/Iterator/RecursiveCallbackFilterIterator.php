<?php
/**
 * RecursiveCallbackFilterIterator
 *
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveCallbackFilterIterator extends \RecursiveCallbackFilterIterator implements \OuterIterator, \RecursiveIterator // extends \CallbackFilterIterator
{
    public function __construct(\RecursiveIterator $iterator ,$callback){parent::__construct($iterator,$callback);}//

    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//The inner iterator's children, as a RecursiveCachingIterator.
    public function hasChildren(){return parent::hasChildren();}//TRUE if the inner iterator has children, otherwise FALSE
    /* Inherits */
    // FilterIterator
    public function accept(){return parent::accept();}
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