<?php
/**
 * \MongoDB\BSON\Decimal128
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class Decimal128 implements \MongoDB\BSON\Type // \MongoDB\BSON\Decimal128
{
    /* 仅做实例引用 Decimal128 ,\MongoDB\BSON\Decimal128 中不存在此属性 */public $parent;
    final public function __construct($value=null){$this->parent=new \MongoDB\BSON\Decimal128($value);}
    final public function __toString(){return $this->parent->__toString();}
}