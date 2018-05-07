<?php
/**
 * \MongoDB\Driver\WriteConcern
 * MongoDB\Driver\WriteConcern describes the level of acknowledgement requested from MongoDB
 * for write operations to a standalone mongod or to replica sets or to sharded clusters. In
 * sharded clusters, mongos instances will pass the write concern on to the shards.
 * [在 \MongoDB\Driver\Manager::executeBulkWrite(BulkWrite,WriteConcern) 时设置有关写操作的选项，属性]
 * 参见 https://docs.mongodb.org/manual/reference/write-concern/
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class WriteConcern implements \MongoDB\BSON\Serializable // final \MongoDB\Driver\WriteConcern
{
    /* Constants */
    /**
     * Requests acknowledgment that write operations have propagated to the majority of voting nodes,
     * including the primary, and have been written to the on-disk journal for these nodes.
     */
    const MAJORITY = 'majority' ;

    /* 虚拟变量 */
    /* 仅做实例引用 WriteConcern ,\MongoDB\Driver\WriteConcern 中不存在此属性 */public $parent;
    public static $w=[
        1,//Requests acknowledgement that the write operation has propagated to the standalone mongod or the primary in a replica set. This is the default
        0,//Requests no acknowledgment of the write operation.
        /* integer greater than 1:Numbers greater than 1 are valid only for replica sets to request acknowledgement from specified number of members, including the primary.  */
        self::MAJORITY,
        /* string:A string value is interpereted as a tag set. Requests acknowledgement that the write operations have propagated to a replica set member with the specified tag.  */
    ];
    final public function __construct($w,$wtimeout=null,$journal=null){$this->parent=new \MongoDB\Driver\WriteConcern($w,$wtimeout,$journal);}
    final public function getW(){return $this->parent->getW();}//Returns the WriteConcern's "w" option
    final public function getWtimeout(){return $this->parent->getWtimeout();}//Returns the WriteConcern's "wtimeout" option
    final public function getJournal(){return $this->parent->getJournal();}//Returns the WriteConcern's "journal" option
    // \MongoDB\BSON\Serializable
    final public function bsonSerialize(){return $this->parent->bsonSerialize();}//Returns an object for BSON serialization
}