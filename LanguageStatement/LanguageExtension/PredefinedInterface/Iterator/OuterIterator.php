<?php
/**
 * OuterIterator interface
 * Classes implementing OuterIterator can be used to iterate over iterators.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


interface OuterIterator extends \OuterIterator,\Iterator
{

    public function getInnerIterator();//Returns the inner iterator for the current entry.

    /**
     * Iterator
     * abstract public mixed Iterator::current ( void )
     * abstract public scalar Iterator::key ( void )
     * abstract public void Iterator::next ( void )
     * abstract public void Iterator::rewind ( void )
     * abstract public boolean Iterator::valid ( void )
     */
}