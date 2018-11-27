<?php
/**
 * \MongoDB\Driver\BulkWrite
 * The MongoDB\Driver\BulkWrite collects one or more write operations that should be sent to the server.
 * After adding any number of insert, update, and delete operations, the collection may be executed via
 * MongoDB\Driver\Manager::executeBulkWrite().
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class BulkWrite implements \Countable // final \MongoDB\Driver\BulkWrite
{
    /* 仅做实例引用 BulkWrite ,\MongoDB\Driver\BulkWrite 中不存在此属性 */public $parent;
    public static $option=[
        'ordered',//(TRUE) are executed serially on the MongoDB server,
        'collation',//https://docs.mongodb.com/master/reference/collation/#collation-document
        'multi',//Update only the first matching document (multi=false), or all matching documents (multi=true).
        'upsert',//If filter does not match an existing document, insert a single document.
    ];

    final public function __construct(array $options=null){return $this->parent=new \MongoDB\Driver\BulkWrite($options);}//Create a new BulkWrite

    final public function insert($document){return $this->parent->insert($document);}//Add an insert operation to the bulk
    final public function update($filter,$newObj,Array $updateOptions=[]){return $this->parent->update($filter,$newObj,$updateOptions);}//Add an update operation to the bulk
    final public function delete($filter,Array $deleteOptions=null){return $this->parent->delete($filter,$deleteOptions);}//Add a delete operation to the bulk
    // \Countable
    final public function count(){return $this->parent->count();}//Count number of write operations in the bulk
}