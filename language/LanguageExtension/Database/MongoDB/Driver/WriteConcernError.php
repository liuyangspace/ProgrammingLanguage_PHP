<?php
/**
 * MongoDB\Driver\WriteConcernError
 * The MongoDB\Driver\WriteConcernError class encapsulates information about a write concern error and
 * may be returned by MongoDB\Driver\WriteResult::getWriteConcernError().
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class WriteConcernError // final \MongoDB\Driver\WriteConcernError
{
    /* 仅做实例引用 WriteResult ,\MongoDB\Driver\WriteResult 中不存在此属性 */public $parent;
    final private function __construct(\MongoDB\Driver\WriteConcernError $writeConcernError){$this->parent=$writeConcernError;}//私有化

    final public function getCode(){return $this->parent->getCode();}//Returns the WriteConcernError's error code
    final public function getMessage(){return $this->parent->getMessage();}//Returns the WriteConcernError's error message
    final public function getInfo(){return $this->parent->getInfo();}//Returns additional metadata for the WriteConcernError
}