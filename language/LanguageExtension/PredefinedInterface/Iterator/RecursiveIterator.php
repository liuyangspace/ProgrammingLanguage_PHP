<?php
/**
 * RecursiveIterator
 * Classes implementing RecursiveIterator can be used to iterate over iterators recursively.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


interface RecursiveIterator extends \RecursiveIterator,\Iterator
{

    public function getChildren();//Returns an iterator for the current entry.
    public function hasChildren();//Returns if an iterator can be created fot the current entry.

    /**
     * Iterator
     * abstract public mixed Iterator::current ( void )
     * abstract public scalar Iterator::key ( void )
     * abstract public void Iterator::next ( void )
     * abstract public void Iterator::rewind ( void )
     * abstract public boolean Iterator::valid ( void )
     */

}