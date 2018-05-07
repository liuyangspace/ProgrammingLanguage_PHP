<?php
/**
 * StompException
 * Represents an error raised by the stomp extension.
 * See Exceptions for more information about Exceptions in PHP.
 */

namespace LanguageStatement\UtilComponent\Stomp;


class StompException extends \StompException // extends \Exception
{
    /**
     *  继承的方法
     *
     * final public string Exception::getMessage ( void )
     * final public Exception Exception::getPrevious ( void )
     * final public int Exception::getCode ( void )
     * final public string Exception::getFile ( void )
     * final public int Exception::getLine ( void )
     * final public array Exception::getTrace ( void )
     * final public string Exception::getTraceAsString ( void )
     * public stringException::__toString ( void )
     * final private void Exception::__clone ( void )
     *
     * 方法
     * public string getDetails ( void )
     *
     */
}