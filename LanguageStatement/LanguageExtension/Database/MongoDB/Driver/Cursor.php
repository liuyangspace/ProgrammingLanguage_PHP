<?php
/**
 * \MongoDB\Driver\Cursor
 * The MongoDB\Driver\Cursor class encapsulates the results of a MongoDB command or query and may be returned by
 * MongoDB\Driver\Manager::executeCommand() or MongoDB\Driver\Manager::executeQuery(), respectively.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


class Cursor implements \Traversable // \MongoDB\Driver\Cursor
{
    /* 仅做实例引用 Cursor ,\MongoDB\Driver\Cursor 中不存在此属性 */public $parent;
    final private function __construct(\MongoDB\Driver\Cursor $cursor){$this->parent=$cursor;}//私有化

    final public function isDead(){return $this->parent->isDead();}//Checks if the cursor is still open on the server
    final public function toArray(){return $this->parent->toArray();}//Returns an array containing all results for this cursor

    final public function setTypeMap($typemap){$this->parent->setTypeMap($typemap);}//Sets a type map to use for BSON unserialization

    final public function getId(){return $this->parent->getId();}//Returns the ID for this cursor
    final public function getServer(){return $this->parent->getServer();}//Returns the server associated with this cursor

}