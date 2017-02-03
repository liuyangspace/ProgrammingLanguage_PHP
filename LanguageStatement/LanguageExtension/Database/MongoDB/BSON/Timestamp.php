<?php
/**
 * \MongoDB\BSON\Timestamp
 * Represents a » BSON timestamp, which is an internal MongoDB type not intended for general date storage.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class Timestamp implements \MongoDB\BSON\Type // MongoDB\BSON\Timestamp
{
    /* 仅做实例引用 Timestamp ,\MongoDB\BSON\Timestamp 中不存在此属性 */public $parent;
    final public function __construct($increment,$timestamp){$this->parent=new \MongoDB\BSON\Timestamp($increment,$timestamp);}
    final public function __toString(){return $this->parent->__toString();}
}