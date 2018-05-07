<?php
/**
 * RecursiveIteratorIterator
 * Can be used to iterate through recursive iterators.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveIteratorIterator extends \RecursiveIteratorIterator implements \OuterIterator
{

    public function __construct(\Traversable $iterator,$mode=RecursiveIteratorIterator::LEAVES_ONLY,$flags=0){
        parent::__construct($iterator,$mode,$flags);//Creates a RecursiveIteratorIterator from a RecursiveIterator.
    }

    public function beginChildren(){parent::beginChildren();}//Begin children
    public function endChildren(){parent::endChildren();}//End children
    public function callGetChildren(){return parent::callGetChildren();}//Get children of the current element.
    public function callHasChildren(){return parent::callHasChildren();}//Called for each element to test whether it has children.
    public function beginIteration(){parent::beginIteration();}//Begin Iteration
    public function endIteration(){parent::endIteration();}//End Iteration
    public function getSubIterator($level){parent::getSubIterator($level);}//The current active sub iterator.
    public function getDepth(){parent::getDepth();}//Get the current depth of the recursive iteration
    public function getMaxDepth(){parent::getMaxDepth();}//Get max depth
    public function setMaxDepth($max_depth=-1){parent::setMaxDepth($max_depth);}//Set max depth
    public function nextElement(){parent::nextElement();}//Called when the next element is available.
    // Iterator
    public function current(){return parent::current();}//返回当前元素
    public function key(){return parent::key();}//返回当前元素的键
    public function next(){return parent::next();}//向前移动到下一个元素
    public function rewind(){return parent::rewind();}//返回到迭代器的第一个元素
    public function valid(){return parent::valid();}//检查当前位置是否有效
    /* 继承的方法 */
    // OuterIterator
    public function getInnerIterator(){return parent::getInnerIterator();}//Get the inner iterator.

}