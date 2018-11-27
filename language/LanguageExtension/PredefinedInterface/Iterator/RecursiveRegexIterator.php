<?php
/**
 * RecursiveRegexIterator
 * This recursive iterator can filter another recursive iterator via a regular expression.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RecursiveRegexIterator extends \RecursiveRegexIterator implements \RecursiveIterator // extends \RegexIterator
{
    public function __construct(RecursiveIterator $iterator,$regex,$mode=self::MATCH,$flags=0,$preg_flags=0)
    {parent::__construct($iterator,$regex,$mode,$flags,$preg_flags);}//Creates a new RecursiveRegexIterator
    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//Returns an iterator for the current entry.
    public function hasChildren(){return parent::hasChildren();}//Returns whether an iterator can be obtained for the current entry.
    /* 继承的方法 参见 RegexIterator */
}