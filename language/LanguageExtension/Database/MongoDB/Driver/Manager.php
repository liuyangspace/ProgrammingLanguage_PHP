<?php
/**
 * MongoDB\Driver\Manager
 * The MongoDB\Driver\Manager is the main entry point to the extension.
 * It is responsible for maintaining connections to MongoDB (be it standalone server, replica set, or sharded cluster).
 * MongoDB Connection URI: mongodb://[username:password@]host1[:port1][,host2[:port2],...[,hostN[:portN]]][/[database][?options]]
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;

use \MongoDB\Driver\BulkWrite;
use \MongoDB\Driver\WriteConcern;
use \MongoDB\Driver\Command;
use \MongoDB\Driver\ReadPreference;
use \MongoDB\Driver\Query;

final class Manager // final \MongoDB\Driver\Manager
{

    /* 仅做实例引用 Manager ,\MongoDB\Driver\Manager 中不存在此属性 */public $parent;

    public static $option=[
        // Replica Set Option
        'replicaSet',//副本集名
        // Connection Options
        'ssl',//true: Initiate the connection with TLS/SSL.
        'connectTimeoutMS',//The time in milliseconds to attempt a connection before timing out. The default is never to timeout,
        'socketTimeoutMS',//The time in milliseconds to attempt a send or receive on a socket before the attempt times out. The default is never to timeout,
        // Connection Pool Options
        'maxPoolSize',//The maximum number of connections in the connection pool. The default value is 100.
        'minPoolSize',//The minimum number of connections in the connection pool. The default value is 0.
        'maxIdleTimeMS',//The maximum number of milliseconds that a connection can remain idle in the pool before being removed and closed.
        'waitQueueMultiple',//A number that the driver multiples the maxPoolSize value to, to provide the maximum number of threads allowed to wait for a connection to become available from the pool.
        'waitQueueTimeoutMS',//The maximum time in milliseconds that a thread can wait for a connection to become available.
        // Write Concern Options
        'w',
        'wtimeoutMS',
        'journal',
        // readConcern Options
        'readConcernLevel',
        // Read Preference Options
        'readPreference',
        'maxStalenessSeconds',
        'readPreferenceTags',
        // Authentication Options
        'authSource',//
        'authMechanism',//
        'gssapiServiceName',//
        // Server Selection and Discovery Options
        'localThresholdMS',//
        'serverSelectionTimeoutMS',//
        'serverSelectionTryOnce',//
        'heartbeatFrequencyMS',//
        // Miscellaneous Configuration
        'uuidRepresentation',//
        // (更多选项参见 https://docs.mongodb.com/manual/reference/connection-string/#connections-connection-options )
    ];

    public static $driverOption=[
        'allow_invalid_hostname',//Disables hostname validation if TRUE. Defaults to FALSE.
        'ca_dir',//Path to a correctly hashed certificate directory. The system certificate store will be used by default.
        'ca_file',//Path to a certificate authority file. The system certificate store will be used by default.
        'crl_file',//Path to a certificate revocation list file.
        'pem_file',//Path to a PEM encoded certificate to use for client authentication.
        'pem_pwd',//Passphrase for the PEM encoded certificate (if applicable).
        'context',//SSL context options to be used as fallbacks for other driver options (as specified).
        'weak_cert_validation',//Disables certificate validation if TRUE. Defaults to FALSE
    ];

    final public function __construct($uri,Array $options=[],Array $driverOptions=[]){$this->parent=new \MongoDB\Driver\Manager($uri,$options,$driverOptions);}//Create new MongoDB Manager

    final public function executeBulkWrite($namespace,BulkWrite $bulk,WriteConcern $writeConcern=null){return $this->parent->executeBulkWrite($namespace,$bulk,$writeConcern);}//Execute one or more write operations
    final public function executeCommand($db,Command $command,ReadPreference $readPreference=null){return $this->parent->executeCommand($db,$command,$readPreference);}//Execute a database command
    final public function executeQuery($namespace,Query $query,ReadPreference $readPreference=null){return $this->parent->executeQuery($namespace,$query,$readPreference);}//Execute a database query

    final public function getServers(){return $this->parent->getServers();}//Return the servers to which this manager is connected
    final public function selectServer(ReadPreference $readPreference=null){return $this->parent->selectServer($readPreference);}//Select a server matching a read preference
}