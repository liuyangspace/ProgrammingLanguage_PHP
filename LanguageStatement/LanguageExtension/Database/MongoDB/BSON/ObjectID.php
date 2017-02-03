<?php
/**
 * ObjectID
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class ObjectID extends \MongoDB\BSON\ObjectID implements \MongoDB\BSON\Type //
{
    final public function __construct($id=null){parent::__construct($id);}//A 24-character hexadecimal string
    final public function __toString(){return parent::__toString();}
}