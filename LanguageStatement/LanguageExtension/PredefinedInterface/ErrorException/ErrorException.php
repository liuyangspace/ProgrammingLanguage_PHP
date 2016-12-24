<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/24
 * Time: 11:13
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ErrorException;


class ErrorException extends \ErrorException
{
    /**
     * 属性
     * protected int $severity ;//异常的严重程度
     */

    public function __construct($message, $code, $severity, $filename, $lineno, \Exception $previous)
    {
        parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
    }

    /**
     * 方法
     * final public int getSeverity ( void )
     * 继承的方法
     * final public string Exception::getMessage ( void )
     * final public Exception Exception::getPrevious ( void )
     * final public int Exception::getCode ( void )
     * final public string Exception::getFile ( void )
     * final public int Exception::getLine ( void )
     * final public array Exception::getTrace ( void )
     * final public string Exception::getTraceAsString ( void )
     * public stringException::__toString ( void )
     * final private void Exception::__clone ( void )
     */
}