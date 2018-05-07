<?php
/**
 * Persistable
 * Classes may implement this interface to take advantage of automatic ODM (object document mapping)
 * behavior in the driver. During serialization, the driver will inject a __pclass property containing
 * the PHP class name into the data returned by MongoDB\BSON\Serializable::bsonSerialize(). During
 * unserialization, the same __pclass property will then be used to infer the PHP class (independent
 * of any type map configuration) to be constructed before MongoDB\BSON\Unserializable::bsonUnserialize()
 * is invoked. See Persisting Data for additional information.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


interface Persistable extends \MongoDB\BSON\Unserializable, \MongoDB\BSON\Serializable // MongoDB\BSON\Persistable
{
    public function bsonSerialize();//Provides an array or document to serialize as BSON
    public function bsonUnserialize(Array $data);//Constructs the object from a BSON array or document
}