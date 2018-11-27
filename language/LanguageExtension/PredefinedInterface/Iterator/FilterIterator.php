<?php
/**
 * FilterIterator
 * 这个抽象类的遍历并过滤出不想要的值.
 * 这个类应该被实现了迭代过滤器的类继承 FilterIterator::accept()方法必须被子类实现.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


abstract class FilterIterator extends \FilterIterator implements \OuterIterator // extends \IteratorIterator
{
    private $it;

    public function __construct(\Iterator $iterator){parent::__construct($iterator);}//

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