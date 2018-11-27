<?php
/**
 * MongoDB\BSON\MaxKey
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class MaxKey implements \MongoDB\BSON\Type // \MongoDB\BSON\MaxKey
{
    final public function __construct(){return new \MongoDB\BSON\MaxKey();}
}