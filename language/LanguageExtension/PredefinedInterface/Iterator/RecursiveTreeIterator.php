<?php
/**
 * RecursiveTreeIterator
 * Allows iterating over a RecursiveIterator to generate an ASCII graphic tree.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveTreeIterator extends \RecursiveTreeIterator implements \OuterIterator // extends \RecursiveIteratorIterator
{
    /* 常量 */
    const BYPASS_CURRENT        = 4 ;
    const BYPASS_KEY            = 8 ;
    const PREFIX_LEFT           = 0 ;
    const PREFIX_MID_HAS_NEXT   = 1 ;
    const PREFIX_MID_LAST       = 2 ;
    const PREFIX_END_HAS_NEXT   = 3 ;
    const PREFIX_END_LAST       = 4 ;
    const PREFIX_RIGHT          = 5 ;

    // RecursiveIteratorIterator
    public function __construct(\RecursiveIterator/* | \IteratorAggregate */ $iterator,$flags=RecursiveTreeIterator::BYPASS_KEY,$cit_flags = CachingIterator::CATCH_GET_CHILD,$mode=RecursiveIteratorIterator::SELF_FIRST){
        parent::__construct($iterator,$cit_flags,$flags,$mode);//Creates a RecursiveIteratorIterator from a RecursiveIterator.
    }

    public function getEntry(){return parent::getEntry();}//Get current entry
    public function getPrefix(){return parent::getPrefix();}//前缀
    public function getPostfix(){return parent::getPostfix();}//后缀;
    public function setPrefixPart($part,$value){parent::setPrefixPart($part,$value);}//Set a part of the prefix
    // RecursiveIteratorIterator
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