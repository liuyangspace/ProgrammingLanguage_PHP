<?php
/**
 * InfiniteIterator
 * The InfiniteIterator allows one to infinitely iterate over an iterator without having to manually rewind the iterator upon reaching its end.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class InfiniteIterator extends \InfiniteIterator implements \OuterIterator // extends \IteratorIterator
{

    public function __construct(\Iterator $iterator){parent::__construct($iterator);}//Constructs an InfiniteIterator from an Iterator.
    public function next(){parent::next();}//Moves the inner Iterator forward or rewinds it
    /* 继承的方法 */
    // OuterIterator
    public function getInnerIterator(){return parent::getInnerIterator();}//Get the inner iterator.
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function rewind(){return parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效

}