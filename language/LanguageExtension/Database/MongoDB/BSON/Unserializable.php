<?php
/**
 * Unserializable
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


interface Unserializable // MongoDB\BSON\Unserializable
{
    public function bsonUnserialize(Array $data);//Constructs the object from a BSON array or document
}