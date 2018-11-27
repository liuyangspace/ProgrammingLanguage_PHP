<?php
/**
 * CallbackFilterIterator
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class CallbackFilterIterator extends \CallbackFilterIterator implements \OuterIterator // extends FilterIterator
{
    /**
     * CallbackFilterIterator constructor.
     * @param \Iterator $iterator
     * @param callable $callback=function( $current, $key, $iterator ){}
     */
    public function __construct (\Iterator $iterator,callable $callback){parent::__construct($iterator,$callback);}//Creates a filtered iterator using the callback to determine which items are accepted or rejected.

    public function accept(){}

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