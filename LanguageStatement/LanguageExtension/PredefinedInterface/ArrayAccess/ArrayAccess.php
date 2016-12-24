<?php
/**
 * ArrayAccess（数组式访问）接口
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ArrayAccess;


interface ArrayAccess extends \ArrayAccess
{

    abstract public function offsetExists ($offset);
    abstract public function offsetGet ($offset);
    abstract public function offsetSet ($offset ,$value);
    abstract public function offsetUnset ($offset);

}