<?php
/**
 * ArrayObject
 * This class allows objects to work as arrays.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ArrayObject;


class ArrayObject extends \ArrayObject implements \IteratorAggregate, \ArrayAccess, \Serializable, \Countable
{

    /* 常量 */
    const STD_PROP_LIST     = 1 ;//Properties of the object have their normal functionality when accessed as list (var_dump, foreach, etc.).
    const ARRAY_AS_PROPS    = 2 ;//Entries can be accessed as properties (read and write).

    public function __construct($input=[],$flags=0,$iterator_class="ArrayIterator"){parent::__construct($input,$flags,$iterator_class);}//

    public function getFlags(){return parent::getFlags();}//Gets the behavior flags.
    public function setFlags($flags){parent::setFlags($flags);}//Sets the behavior flags.
    public function getIteratorClass(){return parent::getIteratorClass();}//Gets the iterator classname for the ArrayObject.
    public function setIteratorClass($iterator_class){parent::setIteratorClass($iterator_class);}//Sets the iterator classname for the ArrayObject.

    public function append($value){parent::append($value);}//追加新的值作为最后一个元素。
    // sort
    public function ksort(){parent::ksort();}//Sort the entries by key
    public function asort(){parent::asort();}//Sort the entries by value
    public function natsort(){parent::natsort();}//Sort entries using a "natural order" algorithm
    public function natcasesort(){parent::natcasesort();}//Sort an array using a case insensitive "natural order" algorithm
    public function uasort($cmp_function){parent::uasort($cmp_function);}//Sort the entries with a user-defined comparison function and maintain key association
    public function uksort($cmp_function){parent::uksort($cmp_function);}//Sort the entries by keys using a user-defined comparison function
    // array
    public function exchangeArray($input){return parent::exchangeArray($input);}//Exchange the array for another one.
    public function getArrayCopy(){return parent::getArrayCopy();}//Creates a copy of the ArrayObject.
    // IteratorAggregate
    public function getIterator(){return parent::getIterator();}//Create a new iterator from an ArrayObject instance
    // ArrayAccess
    public function offsetExists($index){return parent::offsetExists($index);}//Returns whether the requested index exists
    public function offsetUnset($index){parent::offsetUnset($index);}//Unsets the value at the specified index
    public function offsetGet($index){return parent::offsetGet($index);}//Returns the value at the specified index
    public function offsetSet($index,$newval){parent::offsetSet($index,$newval);}//为指定索引设定新的值
    // Serializable
    public function serialize(){return parent::serialize();}//Serialize an ArrayObject
    public function unserialize($serialized){parent::unserialize($serialized);}//Unserialize an ArrayObject
    // Countable
    public function count(){return parent::count();}//统计 ArrayObject 内 public 属性的数量
}