<?php
/**
 * \MongoDB\Driver\CursorId
 *
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class CursorId //  \MongoDB\Driver\CursorId
{
    /* 仅做实例引用 CursorId ,\MongoDB\Driver\CursorId 中不存在此属性 */public $parent;
    final private function __construct(\MongoDB\Driver\CursorId $cursorId){$this->parent=$cursorId;}//私有化

    final public function __toString(){return $this->parent->__toString();}//String representation of the cursor ID

}