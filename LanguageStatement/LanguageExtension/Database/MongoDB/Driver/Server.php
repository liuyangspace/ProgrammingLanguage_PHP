<?php
/**
 * Server
 * MongoDB\Driver\Server objects are created internally by MongoDB\Driver\Manager when a database
 * connection is established and may be returned by MongoDB\Driver\Manager::getServers() and
 * MongoDB\Driver\Manager::selectServer().
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;

use \MongoDB\Driver\BulkWrite;
use \MongoDB\Driver\WriteConcern;
use \MongoDB\Driver\Command;
use \MongoDB\Driver\ReadPreference;
use \MongoDB\Driver\Query;

final class Server // final \MongoDB\Driver\Server
{
    /* Constants */
    // returned by MongoDB\Driver\Server::getType().
    const TYPE_UNKNOWN          = 0 ; // Unknown server type .
    const TYPE_STANDALONE       = 1 ; // Standalone server type .
    const TYPE_MONGOS           = 2 ; // Mongos server type .
    const TYPE_POSSIBLE_PRIMARY = 3 ; // Replica set possible primary server type .
    const TYPE_RS_PRIMARY       = 4 ; // Replica set primary server type .
    const TYPE_RS_SECONDARY     = 5 ; // Replica set secondary server type .
    const TYPE_RS_ARBITER       = 6 ; // Replica set arbiter server type .
    const TYPE_RS_OTHER         = 7 ; // Replica set other server type,
    const TYPE_RS_GHOST         = 8 ; // Replica set ghost server type,
    /* 虚拟变量 */
    /* 仅做实例引用 Server ,\MongoDB\Driver\Server 中不存在此属性 */public $parent;

    final private function __construct(\MongoDB\Driver\Server $server){$this->parent=$server;}//私有化

    final public function executeBulkWrite($namespace,BulkWrite $bulk,WriteConcern $writeConcern=null){return $this->parent->executeBulkWrite($namespace,$bulk,$writeConcern);}//Execute one or more write operations
    final public function executeCommand($db,Command $command,ReadPreference $readPreference=null){return $this->parent->executeCommand($db,$command,$readPreference);}//Execute a database command
    final public function executeQuery($namespace,Query $query,ReadPreference $readPreference=null){return $this->parent->executeQuery($namespace,$query,$readPreference);}//Execute a database query

    final public function getHost(){return $this->parent->getHost();}//Returns the hostname of this server
    final public function getInfo(){return $this->parent->getInfo();}//Returns an array of information about this server
    final public function getLatency(){return $this->parent->getLatency();}//Returns the latency of this server
    final public function getPort(){return $this->parent->getPort();}//Returns the port on which this server is listening
    final public function getTags(){return $this->parent->getTags();}//Returns the port on which this server is listening
    final public function getType(){return $this->parent->getType();}//Returns the port on which this server is listening

    final public function isArbiter(){return $this->parent->isArbiter();}//Checks if this server is an arbiter member of a replica set
    final public function isHidden(){return $this->parent->isHidden();}//Checks if this server is a hidden member of a replica set
    final public function isPassive(){return $this->parent->isPassive();}//Checks if this server is a passive member of a replica set
    final public function isPrimary(){return $this->parent->isPrimary();}//Checks if this server is a primary member of a replica set
    final public function isSecondary(){return $this->parent->isSecondary();}//Checks if this server is a secondary member of a replica set

}