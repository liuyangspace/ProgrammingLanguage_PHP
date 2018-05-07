<?php
/**
 * MongoDB\BSON\MinKey
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class MinKey implements \MongoDB\BSON\Type // MongoDB\BSON\MinKey
{
    final public function __construct(){return new \MongoDB\BSON\MinKey();}
}