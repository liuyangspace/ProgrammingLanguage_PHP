<?php
/**
 * AppendIterator
 * 这个迭代器能陆续遍历几个迭代器
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class AppendIterator extends \AppendIterator implements \OuterIterator // extends \IteratorIterator
{

    /** @internal array of inner iterators */
    private $iterators;

    // public __construct ( void )
    public function __construct(){parent::__construct();}

    public function append(Iterator $iterator){parent::append($iterator);}//Appends an iterator.
    public function getArrayIterator(){return parent::getArrayIterator();}//gets the ArrayIterator that is used to store the iterators added with AppendIterator::append().
    public function getIteratorIndex(){return parent::getIteratorIndex();}//Gets the index of the current inner iterator.

    /* 继承的方法 */
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