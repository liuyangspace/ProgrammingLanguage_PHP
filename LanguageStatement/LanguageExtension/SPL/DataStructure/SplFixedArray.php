<?php
/**
 * SplFixedArray 阵列
 */

namespace LanguageStatement\LanguageExtension\SPL\DataStructure;


class SplFixedArray extends \SplFixedArray implements \Iterator, \ArrayAccess, \Countable
{
    public function __construct($size){parent::__construct($size);}//

    public static function fromArray(array $array,$save_indexes=true){return parent::fromArray($array,$save_indexes);}//Import a PHP array in a SplFixedArray instance
    public function getSize(){return parent::getSize();}//Gets the size of the array
    public function setSize($size){return parent::setSize($size);}//Change the size of an array
    public function toArray(){return parent::toArray();}//Returns a PHP array from the fixed array
    public function __wakeup(){}//Reinitialises the array after being unserialised
    // Iterator
    public function current(){return parent::current();}
    public function key(){return parent::key();}//Return current array index
    public function rewind(){parent::rewind();}//Rewind iterator back to the start
    public function valid(){return parent::valid();}//Check whether the array contains more elements
    public function next(){parent::next();}//Move to next entry
    // ArrayAccess
    public function offsetExists($index){return parent::offsetExists($index);}//Returns whether the requested index exists
    public function offsetGet($index){return parent::offsetGet($index);}//Returns the value at the specified index
    public function offsetSet($index, $newval){parent::offsetSet($index, $newval);}//Sets a new value at a specified index
    public function offsetUnset($index){parent::offsetUnset($index);}//Unsets the value at the specified $index
    // Countable
    public function count(){return parent::count();}
}