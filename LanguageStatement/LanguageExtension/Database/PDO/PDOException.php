<?php
/**
 * PDOException
 */

namespace LanguageStatement\LanguageExtension\Database\PDO;


class PDOException extends \RuntimeException
{
    /* 属性 */
    public $errorInfo ;//相当于PDO::errorInfo() 或 PDOStatement::errorInfo()
    protected $message ;//文本错误信息。用 Exception::getMessage() 来访问。
    protected $code ;//SQLSTATE 错误码。用Exception::getCode() 来访问。
}