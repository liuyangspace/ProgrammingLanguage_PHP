<?php
/**
 * BadFunctionCallException 函数调用异常（未定义或传参错误）
 * Exception thrown if a callback refers to an undefined function or if some arguments are missing.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Exception;


class BadFunctionCallException extends \LogicException
{

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