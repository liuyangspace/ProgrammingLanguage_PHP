<?php
/**
 * MongoDB\Driver\ReadConcern
 * MongoDB\Driver\ReadConcern controls the level of isolation for read operations for replica sets and replica set shards.
 * This option requires the WiredTiger storage engine and MongoDB 3.2 or later.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class ReadConcern implements \MongoDB\BSON\Serializable // final \MongoDB\Driver\ReadConcern
{
    /* Constants */
    const LINEARIZABLE  = 'linearizable' ;  // A linearizable read avoids returning reads from a stale primary (one that has already been superseded by a new primary but doesn't know it yet).
    const LOCAL         = 'local' ;         // Queries using this read concern will return the node's most recent copy of the data.
    const MAJORITY      = 'majority' ;      // Queries using this read concern will return the node's most recent copy of the data confirmed as having been written to a majority of the nodes (i.e. the data cannot be rolled back).

    /* 虚拟变量 */
    /* 仅做实例引用 ReadConcern ,\MongoDB\Driver\ReadConcern 中不存在此属性 */public $parent;
    final public function __construct($level=null){$this->parent=new \MongoDB\Driver\ReadConcern($level);}

    final public function getLevel(){return $this->parent->getLevel();}//Returns the ReadConcern's "level" option

    final public function bsonSerialize(){return $this->parent->bsonSerialize();}//Returns an object for BSON serialization

}