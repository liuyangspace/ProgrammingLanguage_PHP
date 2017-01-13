<?php
/**
 * SplObjectStorage 映射
 * SPL provides a map from objects(key) to data(value).
 * This map can also be used as an object set(包含、交集、差集、并集、补集).
 */

namespace LanguageStatement\LanguageExtension\SPL\DataStructure;


class SplObjectStorage extends \SplObjectStorage implements \Countable, \Iterator, \Serializable, \ArrayAccess
{

    public function addAll(\SplObjectStorage $storage){parent::addAll($storage);}//Adds all objects from another storage
    public function attach($object,$data=NULL){parent::attach($object,$data);}//Adds an object in the storage
    public function detach($object){parent::detach($object);}//Removes an object from the storage
    public function contains($object){return parent::contains($object);}//Checks if the storage contains a specific object
    public function getHash($object){return parent::getHash($object);}//Calculate a unique identifier for the contained objects
    public function setInfo($data){parent::setInfo($data);}//Sets the data associated with the current iterator entry
    public function getInfo(){return parent::getInfo();}//Returns the data associated with the current iterator entry
    public function removeAll(\SplObjectStorage $storage){parent::removeAll($storage);}//Removes objects contained in another storage from the current storage
    public function removeAllExcept(\SplObjectStorage $storage){parent::removeAllExcept($storage);}//Removes all objects except for those contained in another storage from the current storage
    // Countable
    public function count(){return parent::count();}//Returns the number of objects in the storage
    // Iterator
    public function current(){return parent::current();}//Returns the current storage entry
    public function key(){return parent::key();}//Returns the index at which the iterator currently is
    public function rewind(){parent::rewind();}//Rewind the iterator to the first storage element
    public function valid(){return parent::valid();}//Returns if the current iterator entry is valid
    public function next(){parent::next();}//Move to next entry
    // ArrayAccess
    public function offsetExists($object){return parent::offsetExists($object);}//Checks whether an object exists in the storage
    public function offsetGet($object){return parent::offsetGet($object);}//Returns the data associated with an object
    public function offsetSet($object, $data = NULL){parent::offsetSet($object, $data = NULL);}//Associates data to an object in the storage
    public function offsetUnset($object){parent::offsetUnset($object);}//Removes an object from the storage
    // Serializable
    public function serialize(){return parent::serialize();}//Serializes the storage
    public function unserialize($serialized){parent::unserialize($serialized);}//Unserializes a storage from its string representation

}