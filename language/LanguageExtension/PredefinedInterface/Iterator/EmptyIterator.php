<?php
/**
 * EmptyIterator
 * The EmptyIterator class for an empty iterator.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class EmptyIterator extends \EmptyIterator implements Iterator
{
    // Iterator
    public function current(){return parent::current();}//It throws an exception upon access.
    public function key(){return parent::key();}//It throws an exception upon access.
    public function next(){parent::next();}//No operation, nothing to do.
    public function rewind(){parent::rewind();}//No operation, nothing to do.
    public function valid(){return parent::valid();}//return FALSE
}