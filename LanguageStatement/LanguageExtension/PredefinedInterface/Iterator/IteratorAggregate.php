<?php
/**
 * IteratorAggregate（聚合式迭代器）接口
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


interface IteratorAggregate extends \IteratorAggregate,\Traversable
{

    public function getIterator();

    /**
     * Iterator
     * abstract public mixed Iterator::current ( void )
     * abstract public scalar Iterator::key ( void )
     * abstract public void Iterator::next ( void )
     * abstract public void Iterator::rewind ( void )
     * abstract public boolean Iterator::valid ( void )
     */
}