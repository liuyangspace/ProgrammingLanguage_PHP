<?php
/**
 * PHP 错误 异常 日志
 *
 */

namespace LanguageStatement\LanguageExtension\Error;

class Error
{
    const DEBUG_BACKTRACE_PROVIDE_OBJECT    = DEBUG_BACKTRACE_PROVIDE_OBJECT;//是否填充 "object" 的索引
    const DEBUG_BACKTRACE_IGNORE_ARGS       = DEBUG_BACKTRACE_IGNORE_ARGS;//是否忽略 "args" 的索引，包括所有的 function/method 的参数，能够节省内存开销。

    public static $constants=[
        'E_ALL'                 => E_ALL.':E_STRICT出外的所有错误和警告信息。',
        //error level
        'E_ERROR'               => E_ERROR.':致命的运行时错误。脚本终止不再继续运行。',
        'E_RECOVERABLE_ERROR '  => E_RECOVERABLE_ERROR .':可被捕捉(set_error_handler())的致命错误。',
        'E_WARNING'             => E_WARNING.':运行时警告 (非致命错误)。仅给出提示信息，但是脚本不会终止运行。',
        'E_PARSE'               => E_PARSE.':编译时语法解析错误。解析错误仅仅由分析器产生。',
        'E_NOTICE'              => E_NOTICE.':运行时通知。',
        //兼容性
        'E_STRICT'              => E_STRICT.':启用 PHP 对代码的修改建议，以确保代码具有最佳的互操作性和向前兼容性。',
        'E_DEPRECATED'          => E_DEPRECATED.':运行时通知。启用后将会对在未来版本中可能无法正常工作的代码给出警告。',
        //由PHP引擎核心产生的
        'E_CORE_ERROR'          => E_CORE_ERROR.':在PHP初始化启动过程中发生的致命错误。该错误类似 E_ERROR。',
        'E_CORE_WARNING'        => E_CORE_WARNING.':PHP初始化启动过程中发生的警告 (非致命错误) 。类似 E_WARNING。',
        //Zend脚本引擎产生的
        'E_COMPILE_ERROR'       => E_COMPILE_ERROR.':致命编译时错误。类似E_ERROR。',
        'E_COMPILE_WARNING'     => E_COMPILE_WARNING.':编译时警告 (非致命错误)。类似 E_WARNING。',
        //用户自定义产生的  使用PHP函数 trigger_error()来产生的
        'E_USER_ERROR'          => E_USER_ERROR.':用户产生的错误信息。类似 E_ERROR。',
        'E_USER_WARNING'        => E_USER_WARNING.':用户产生的警告信息。类似 E_WARNING。',
        'E_USER_NOTICE'         => E_USER_NOTICE.':用户产生的通知信息。类似 E_NOTICE。',
        'E_USER_DEPRECATED'     => E_USER_DEPRECATED.':用户产少的警告信息。 类似 E_DEPRECATED。',
    ];

    public static $configs=[
        'error_reporting',//integer:设置错误报告的级别。
        'display_errors',//string,该选项设置是否将错误信息作为输出的一部分显示到屏幕，或者对用户隐藏而不显示。
        'display_startup_errors',//boolean,即使 display_errors 设置为开启, PHP 启动过程中的错误信息也不会被显示。
        'log_errors',//boolean,设置是否将脚本运行的错误信息记录到服务器错误日志或者error_log之中。
        'log_errors_max_len',//设置 log_errors 的最大字节数. 在 error_log 会添加有关错误源的信息。
        'ignore_repeated_errors',//不记录重复的信息。
        'ignore_repeated_source',//忽略重复消息时，也忽略消息的来源。
        'report_memleaks',//如果这个参数设置为Off，则内存泄露信息不会显示 (在 stdout 或者日志中)。
        'track_errors',//如果开启，最后的一个错误将永远存在于变量 $php_errormsg 中。
        'html_errors',//在错误信息中关闭HTML标签。
        'xmlrpc_errors',//关闭正常的错误报告，并将错误的格式设置为XML-RPC错误信息的格式。
        'xmlrpc_error_number',//用作 XML-RPC faultCode 元素的值。
        'docref_root',//新的错误信息格式包含了对应的参考页面，该页面对错误进行具体描述，或者描述了导致该错误发生的函数。
        'docref_ext',//
        'error_prepend_string',//错误信息之前输出的内容。
        'error_append_string',//错误信息之后输出的内容。
        'error_log',//设置脚本错误将被记录到的文件。
    ];

    //
    public static function error_reporting($level){return error_reporting($level);}//设置应该报告何种 PHP 错误
    //
    public static function trigger_error($level,$error_type=E_USER_NOTICE){return trigger_error($level,$error_type);}//产生一个用户级别的 error/warning/notice 信息
    public static function user_error($level,$error_type=E_USER_NOTICE){return user_error($level,$error_type);}//trigger_error() 的别名
    public static function set_error_handler($handler,$types){return set_error_handler($handler,$types);}//设置一个用户定义的错误处理函数
    public static function restore_error_handler(){return restore_error_handler();}//还原之前的错误处理函数
    public static function set_exception_handler($handler){return set_exception_handler($handler);}//设置一个用户定义的异常处理函数。
    public static function restore_exception_handler(){return restore_exception_handler();}//恢复之前定义过的异常处理函数。
    // 跟踪 trace
    public static function debug_backtrace($options=DEBUG_BACKTRACE_PROVIDE_OBJECT,$limit = 0){return debug_backtrace($options,$limit);}//产生一条回溯跟踪(backtrace)
    public static function debug_print_backtrace($options=0,$limit=0){debug_print_backtrace($options,$limit);}//打印一条回溯。
    //
    public static function error_get_last(){error_get_last();}//获取最后发生的错误
    public static function error_clear_last(){error_clear_last();}//Clear the most recent error
    public static function error_log($message,$type=0,$destination,$extra_headers){return error_log($message,$type=0,$destination,$extra_headers);}//把错误信息发送到 web 服务器的错误日志，或者到一个文件里。

}