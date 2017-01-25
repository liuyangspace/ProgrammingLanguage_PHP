<?php
/**
 * MongoDB\Driver\WriteError
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class WriteError // final \MongoDB\Driver\WriteError
{
    /* 仅做实例引用 WriteError ,\MongoDB\Driver\WriteError 中不存在此属性 */public $parent;
    final private function __construct(\MongoDB\Driver\WriteError $writeError){$this->parent=$writeError;}//私有化

    final public function getCode(){return $this->parent->getCode();}//Returns the WriteError's error code
    final public function getMessage(){return $this->parent->getMessage();}//Returns the WriteError's error message
    final public function getIndex(){return $this->parent->getIndex();}//Returns the index of the write operation corresponding to this WriteError
    final public function getInfo(){return $this->parent->getInfo();}//Returns additional metadata for the WriteError
}