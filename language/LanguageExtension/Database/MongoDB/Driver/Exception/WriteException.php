<?php
/**
 * MongoDB\Driver\Exception\WriteException
 * Base class for exceptions thrown by a failed write operation.
 * The exception encapsulates a MongoDB\Driver\WriteResult object.
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\Driver\Exception;


abstract class WriteException extends \MongoDB\Driver\Exception\RuntimeException implements \MongoDB\Driver\Exception\Exception
{
    /* 属性 */
    protected  $writeResult;//The MongoDB\Driver\WriteResult associated with the failed write operation.
    /* 方法 */
    final public function getWriteResult(){}//Returns the WriteResult for the failed write operation.
    /**
     * 继承的成员
     *
     * // 属性
     * protected string $message ;          // 异常信息
     * protected int $code ;                // 用户自定义异常代码
     * protected string $file ;             // 发生异常的文件名
     * protected int $line ;                // 发生异常的代码行号
     * // 方法
     *       public string      function __toString ( void );       // 可输出的字符串
     * final private void       function __clone( void );           // Inhibits cloning of exceptions.
     *
     * final public string      function getMessage( void );        // 返回异常信息
     * final public int         function getCode( void );           // 返回异常代码
     * final public string      function getFile( void );           // 返回发生异常的文件名
     * final public int         function getLine( void );           // 返回发生异常的代码行号
     * final public array       function getTrace( void );          // backtrace() 数组
     * final public Exception   function getPrevious( void );       // 之前的 exception
     * final public string      function getTraceAsString( void );  // 已格成化成字符串的 getTrace() 信息
     */
}