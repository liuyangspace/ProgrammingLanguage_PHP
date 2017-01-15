<?php
/**
 * ArrayObject
 * This class allows objects to work as arrays.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ArrayObject;


class ArrayObject extends \ArrayObject implements \IteratorAggregate, \ArrayAccess, \Serializable, \Countable
{

    /* 常量 */
    const STD_PROP_LIST = 1 ;
    const ARRAY_AS_PROPS = 2 ;

    public function __construct($input=[],$flags=0,$iterator_class="ArrayIterator"){parent::__construct($input,$flags,$iterator_class);}//

}