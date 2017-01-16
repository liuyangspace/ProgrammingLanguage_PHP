<?php
/**
 * MultipleIterator
 * An Iterator that sequentially iterates over all attached iterators
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class MultipleIterator extends \MultipleIterator implements Iterator
{
    /* 常量 */
    const MIT_NEED_ANY      = 0 ; // Do not require all sub iterators to be valid in iteration.
    const MIT_NEED_ALL      = 1 ; // Require all sub iterators to be valid in iteration.
    const MIT_KEYS_NUMERIC  = 0 ; // Keys are created from the sub iterators position.
    const MIT_KEYS_ASSOC    = 2 ; // Keys are created from sub iterators associated information.

    public function __construct($flags){parent::__construct($flags);}//Constructs a new MultipleIterator
    public function getFlags(){return parent::getFlags();}//Gets the flag information
    public function setFlags($flags){parent::setFlags($flags);}//Sets flags

    public function attachIterator(\Iterator $iterator,$infos){return parent::attachIterator($iterator,$infos);}//Attaches iterator information
    public function detachIterator(\Iterator $iterator){return parent::detachIterator($iterator);}//Detaches an iterator.
    public function containsIterator(\Iterator $iterator){return parent::containsIterator($iterator);}//Checks if an iterator is attached
    public function countIterators(){return parent::countIterators();}//Gets the number of attached iterator instances
    // Iterator
    public function current(){return parent::current();}//Gets the registered iterator instances
    public function key(){return parent::key();}//Gets the registered iterator instances
    public function next(){parent::next();}//Moves all attached iterator instances forward
    public function rewind(){parent::rewind();}//Rewinds all attached iterator instances
    public function valid(){return parent::valid();}//Checks the validity of sub iterators
}