<?php
/**
 * LimitIterator
 * LimitIterator类允许遍历一个 Iterator 的限定子集的元素.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class LimitIterator extends \LimitIterator implements \OuterIterator // extends \IteratorIterator
{
    //Constructs a new LimitIterator from an iterator with a given starting offset and maximum count
    public function __construct(\Iterator $iterator,$offset=0,$count=-1){parent::__construct($iterator,$offset,$count);}

    public function getPosition(){return parent::getPosition();}//Return the current position
    public function seek($position){return parent::seek($position);}//Seek to the given position
    // OuterIterator
    public function getInnerIterator(){return parent::getInnerIterator();}//Get the inner iterator.
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){parent::next();}//向前移动到下一个元素
    public function rewind(){parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效
}