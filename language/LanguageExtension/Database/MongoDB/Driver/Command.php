<?php
/**
 * MongoDB\Driver\Command
 * The MongoDB\Driver\Command class is a value object that represents a database command.
 * To provide "Command Helpers" the MongoDB\Driver\Command object should be composed.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver;


final class Command // final \MongoDB\Driver\Command
{
    final public function __construct($document){return new \MongoDB\Driver\Command($document);}
}