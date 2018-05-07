<?php
/**
 * \MongoDB\Driver\Query
 * The MongoDB\Driver\Query class is a value object that represents a database query.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class Query // final \MongoDB\Driver\Query
{
    public static $option=[
        'allowPartialResults',//For queries against a sharded collection, returns partial results from the mongos if some shards are unavailable instead of throwing an error.
        'awaitData',//
        'batchSize',//The number of documents to return in the first batch. Defaults to 101.
        'collation',// https://docs.mongodb.com/master/reference/collation/
        'comment',//A comment to attach to the query to help interpret and trace query profile data.
        'exhaust',//Stream the data down full blast in multiple "more" packages, on the assumption that the client will fully read all data queried.
        'explain',//If TRUE, the returned MongoDB\Driver\Cursor will contain a single document that describes the process and indexes used to return the query.
        'hint',//Index specification
        'sort',//The sort specification for the ordering of the results.
        'limit',//The maximum number of documents to return.
        'skip',//Number of documents to skip. Defaults to 0.
        'max',//The exclusive upper bound for a specific index.
        'min',//The inclusive lower bound for a specific index.
        'maxScan',//Positive integer denoting the maximum number of documents or index keys to scan when executing the query.
        'maxTimeMS',//The cumulative time limit in milliseconds for processing operations on the cursor.
        'modifiers',//modifying the output or behavior of a query.http://docs.mongodb.org/manual/reference/operator/query-modifier/
        'noCursorTimeout',//Prevents the server from timing out idle cursors after an inactivity period (10 minutes).
        'oplogReplay',//Internal use for replica sets.
        'projection',//to determine which fields to include in the returned documents.
        'returnKey',//If TRUE, returns only the index keys in the resulting documents.
        'showRecordId',//Determines whether to return the record identifier for each document.
        'singleBatch',//Determines whether to close the cursor after the first batch. Defaults to FALSE.
        'readConcern',//
        'slaveOk',//Allow query of replica set secondaries
        'snapshot',//Prevents the cursor from returning a document more than once because of an intervening write operation.
        'tailable',//Returns a tailable cursor for a capped collection.
    ];
    /* 仅做实例引用 WriteResult ,\MongoDB\Driver\WriteResult 中不存在此属性 */public $parent;
    final public function __construct($filter,Array $options=null){$this->parent=new \MongoDB\Driver\Query($filter,$options);}//私有化

}