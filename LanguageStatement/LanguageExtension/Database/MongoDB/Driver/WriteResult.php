<?php
/**
 * MongoDB\Driver\WriteResult
 * The MongoDB\Driver\WriteResult class encapsulates information about an executed MongoDB\Driver\BulkWrite and
 * may be returned by MongoDB\Driver\Manager::executeBulkWrite().
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class WriteResult // final \MongoDB\Driver\WriteResult
{
    /* 仅做实例引用 WriteResult ,\MongoDB\Driver\WriteResult 中不存在此属性 */public $parent;
    final private function __construct(\MongoDB\Driver\WriteResult $writeResult){$this->parent=$writeResult;}//私有化

    // 添加 更新添加
    final public function getInsertedCount(){return $this->parent->getInsertedCount();}//Returns the number of documents inserted (excluding upserts)
    final public function getUpsertedCount(){return $this->parent->getUpsertedCount();}//Returns the number of documents inserted by an upsert
    final public function getUpsertedIds(){return $this->parent->getUpsertedIds();}//Returns an array of identifiers for upserted documents
    // 修改
    final public function getMatchedCount(){return $this->parent->getMatchedCount();}//Returns the number of documents selected for update
    final public function getModifiedCount(){return $this->parent->getModifiedCount();}//Returns the number of documents selected for update
    // 删除
    final public function getDeletedCount(){return $this->parent->getDeletedCount();}//Returns the number of documents deleted

    final public function getServer(){return $this->parent->getServer();}//Returns the server associated with this write result

    final public function isAcknowledged(){return $this->parent->isAcknowledged();}//Returns whether the write was acknowledged
    // error
    final public function getWriteErrors(){return $this->parent->getWriteErrors();}//Returns any write errors that occurred
    final public function getWriteConcernError(){return $this->parent->getWriteConcernError();}//Returns any write concern error that occurred

}