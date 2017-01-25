<?php
/**
 * MongoDB\BSON\Serializable
 * return data to be serialized as a BSON array or document in lieu of the object's public properties.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


interface Serializable extends \MongoDB\BSON\Serializable // implements \MongoDB\BSON\Type
{
    public function bsonSerialize();//Provides an array or document to serialize as BSON
}