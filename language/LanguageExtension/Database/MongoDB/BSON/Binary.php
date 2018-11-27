<?php
/**
 * MongoDB\BSON\Binary
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class Binary implements \MongoDB\BSON\Type // \MongoDB\BSON\Binary
{
    /* Constants */
    const TYPE_GENERIC      = 0 ;   //
    const TYPE_FUNCTION     = 1 ;
    const TYPE_OLD_BINARY   = 2 ;
    const TYPE_OLD_UUID     = 3 ;
    const TYPE_UUID         = 4 ;
    const TYPE_MD5          = 5 ;
    const TYPE_USER_DEFINED = 128 ;

    /* 仅做实例引用 Binary ,\MongoDB\BSON\Binary 中不存在此属性 */public $parent;
    final public function __construct($data,$type){$this->parent=new \MongoDB\BSON\Binary($data,$type);}
    final public function getData(){return $this->parent->getData();}//Returns the Binary's data
    final public function getType(){return $this->parent->getType();}//Returns the Binary's type

}