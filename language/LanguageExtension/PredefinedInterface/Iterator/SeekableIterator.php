<?php
/**
 * SeekableIterator
 * The Seekable iterator.
 * 可以改变当前指针指向位置的迭代器（支持seek操作）
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


interface SeekableIterator extends \SeekableIterator,\Iterator
{

    public function seek($position);//Seeks to a position

    /**
     * Iterator
     * abstract public mixed Iterator::current ( void )
     * abstract public scalar Iterator::key ( void )
     * abstract public void Iterator::next ( void )
     * abstract public void Iterator::rewind ( void )
     * abstract public boolean Iterator::valid ( void )
     */

}