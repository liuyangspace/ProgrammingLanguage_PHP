<?php
/**
 * MongoDB\BSON\Serializable
 * return data to be serialized as a BSON array or document in lieu of the object's public properties.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


interface Serializable extends \MongoDB\BSON\Type //  \MongoDB\BSON\Serializable
{
    public function bsonSerialize();//Provides an array or document to serialize as BSON
}