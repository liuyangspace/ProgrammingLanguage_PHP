<?php
/**
 * PHP Exception
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Exception;


class Exception extends \Exception
{

    // 属性
    protected $message = 'Unknown exception';   // 异常信息
    private   $string;                          // __toString cache
    protected $code = 0;                        // 用户自定义异常代码
    protected $file;                            // 发生异常的文件名
    protected $line;                            // 发生异常的代码行号
    private   $trace;                           // backtrace,指向上一个异常
    private   $previous;                        // previous exception if nested exception


    public function __construct($message, $code, Exception $previous){parent::__construct($message, $code, $previous);}
    public function __toString(){parent::__toString();}// 可输出的字符串
    /**
     * 方法
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