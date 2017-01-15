<?php
/**
 * IteratorIterator
 * 把其他类型数据转为迭代器
 * This iterator wrapper allows the conversion of anything that is Traversable into an Iterator.
 * It is important to understand that most classes that do not implement Iterators have reasons as most likely they do not allow the full Iterator feature set.
 *
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class IteratorIterator extends  \IteratorIterator implements \OuterIterator
{

    public function __construct(\Traversable $iterator){return parent::__construct($iterator);}// Creates an iterator from anything that is traversable
    // OuterIterator
    public function getInnerIterator(){return parent::getInnerIterator();}//Get the inner iterator.
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){return parent::next();}//向前移动到下一个元素
    public function rewind(){return parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效

}