<?php
/**
 * NoRewindIterator
 * This iterator cannot be rewound.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class NoRewindIterator extends \IteratorIterator
{
    public function __construct(\Iterator $iterator){parent::__construct($iterator);}//Construct a NoRewindIterator
    // OuterIterator
    public function getInnerIterator(){return parent::getInnerIterator();}//Get the inner iterator.
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){return parent::next();}//向前移动到下一个元素
    public function rewind(){return parent::rewind();}//Prevents the rewind operation on the inner iterator.
    public function valid(){return parent::valid();}//检查当前位置是否有效
}