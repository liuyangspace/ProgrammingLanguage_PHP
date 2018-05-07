<?php
/**
 * \MongoDB\BSON\UTCDateTime
 *
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class UTCDateTime implements \MongoDB\BSON\Type // \MongoDB\BSON\UTCDateTime
{
    /* 仅做实例引用 UTCDateTime ,\MongoDB\BSON\UTCDateTime 中不存在此属性 */public $parent;
    final public function __construct($milliseconds){$this->parent=new \MongoDB\BSON\UTCDateTime($milliseconds);}
    final public function __toString(){return $this->parent->__toString();}
    final public function toDateTime(){return $this->parent->toDateTime();}
}