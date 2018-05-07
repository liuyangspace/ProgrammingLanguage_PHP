<?php
/**
 * BSON
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB;


class BSON
{
    public static function fromJSON($json){return \MongoDB\BSON\fromJSON($json);}//Returns the BSON representation of a JSON value
    public static function fromPHP($value){return \MongoDB\BSON\fromPHP($value);}//Returns the BSON representation of a PHP value
    public static function toJSON($bson){return \MongoDB\BSON\toJSON($bson);}//Returns the JSON representation of a BSON value
    public static function toPHP($bson,Array $typeMap=[]){return \MongoDB\BSON\toPHP($bson,$typeMap);}//Returns the JSON representation of a BSON value
}