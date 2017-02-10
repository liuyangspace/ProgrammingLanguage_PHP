<?php
/**
 * SimpleXMLIterator
 * The SimpleXMLIterator provides recursive iteration over all nodes of a SimpleXMLElement object.
 */

namespace LanguageStatement\LanguageExtension\DataFormat\XML\SimpleXML;


class SimpleXMLIterator extends \SimpleXMLIterator implements \RecursiveIterator, \Countable // extends \SimpleXMLElement
{
    // RecursiveIterator
    public function current(){return parent::current();}
    public function key(){return parent::key();}
    public function next(){return parent::next();}
    public function valid(){return parent::valid();}
    public function rewind(){parent::rewind();}

    // Iterator
    public function hasChildren(){return parent::hasChildren();}//
    public function getChildren(){return parent::getChildren();}//

    // Countable
    public function count(){return parent::count();}

    // SimpleXMLElement (参见 SimpleXMLElement.php )
}