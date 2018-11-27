<?php
/**
 * MongoDB\BSON\Javascript
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class Javascript implements \MongoDB\BSON\Type // \MongoDB\BSON\Javascript
{
    final public function __construct($code,Array $scope=null){return new \MongoDB\BSON\Javascript($code,$scope);}
}