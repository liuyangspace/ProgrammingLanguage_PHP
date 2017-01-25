<?php
/**
 * ReadPreference
 * 关于 副本集 读取优先级的类
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class ReadPreference implements \MongoDB\BSON\Serializable // extends \MongoDB\Driver\ReadPreference
{
    /* Constants */
    const RP_PRIMARY                = 1 ; // All operations read from the current replica set primary. This is the default read preference for MongoDB.
    const RP_PRIMARY_PREFERRED      = 5 ; // operations read from the primary but if it is unavailable, operations read from secondary members.
    const RP_SECONDARY              = 2 ; // All operations read from the secondary members of the replica set.
    const RP_SECONDARY_PREFERRED    = 6 ; // In most situations, operations read from secondary members but if no secondary members are available, operations read from the primary.
    const RP_NEAREST                = 10 ;// Operations read from member of the replica set with the least network latency, irrespective of the member's type.
    /* 虚拟变量 */
    /* 仅做实例引用 ReadPreference ,\MongoDB\Driver\ReadPreference 中不存在此属性 */public $parent;

    /* 方法 */
    final public function __construct($mode,$tagSets){$this->parent=new \MongoDB\Driver\ReadPreference($mode,$tagSets);}//Construct immutable ReadPreference
    final public function getMode(){return $this->parent->getMode();}//Returns the ReadPreference's "mode" option
    final public function getTagSets(){return $this->parent->getTagSets();}//Returns the ReadPreference's "tagSets" option
    // \MongoDB\BSON\Serializable
    final public function bsonSerialize(){return $this->parent->bsonSerialize();}//Returns an object for BSON serialization

}