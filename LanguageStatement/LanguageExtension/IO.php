<?php
/**
 * 当PHP脚本有输出时，输出控制函数可以用这些来控制输出。
 * 这在多种不同情况中非常有用，尤其是用来在脚本开始输出
 * 数据后，发送http头信息到浏览器。输出控制函数不影响由
 * header() 或 setcookie()发送的文件头信息，仅影响象
 * echo这样的函数和PHP代码块间的数据。
 */

namespace LanguageStatement\LanguageExtension;

class IO
{
    //访问各个输入/输出流（I/O streams）
    public static $ioStreams=[
        'php://stdin',      //直接访问 PHP 进程相应的输入流,只读
        'php://stdout',     //直接访问 PHP 进程相应的输出流,只写
        'php://stderr',     //直接访问 PHP 进程相应的错误输出流,只写
        'php://input',      //访问请求的原始数据的只读流。POST 请求的情况下，最好使用 php://input 来代替 $HTTP_RAW_POST_DATA
        'php://output',     //允许你以 print 和 echo 一样的方式 写入到输出缓冲区。
        'php://fd',         //允许直接访问指定的文件描述符。
        'php://memory',     //把数据储存在内存中
        'php://temp',       //在内存量达到预定义的限制后（默认是 2MB）存入临时文件中
        'php://filter',     //设计用于数据流打开时的筛选过滤应用。
    ];

    public static $configs=[
        'output_buffering',//该选项设置为 On 时，将在所有的脚本中使用输出控制。
        'output_handler',//该选项可将脚本所有的输出，重定向到一个函数。
        'implicit_flush',//如将该选项改为 TRUE，PHP 将使输出层，在每段信息块输出后，自动刷新。(同于在每次使用 print、echo等函数或每个 HTML 块之后，调用 PHP 中的 flush() 函数。)

        'max_input_time',//脚本解析输入数据（类似 POST 和 GET）允许的最大时间，单位是秒。
        'max_input_nesting_level',//设置输入变量的嵌套深度 (例如 $_GET，$_POST......)
        'max_input_vars',//接受多少 输入的变量（限制分别应用于 $_GET、$_POST 和 $_COOKIE 超全局变量） 指令的使用减轻了以哈希碰撞来进行拒绝服务攻击的可能性。

        'filter.default',//Filter all $_GET, $_POST, $_COOKIE, $_REQUEST and $_SERVER data by this filter
        'filter.default_flags',//Default flags to apply when the default filter is set.
        /*
         * 废弃
         * magic_quotes_runtime
         * magic_quotes_gpc
         */
    ];

    // 输入
    public static $predefinedVariables = array(
        //超全局变量
        '$GLOBALS',     //高可用，引用全局作用域中可用的全部变量
        '$_SERVER',     //低可用，服务器和执行环境信息
        '$_GET',        //HTTP GET 变量
        '$_POST',       //HTTP POST 变量
        '$_FILES',      //HTTP 文件上传变量
        '$_REQUEST',    //HTTP Request 变量
        '$_SESSION',    //Session 变量
        '$_ENV',        //环境变量
        '$_COOKIE',     //HTTP Cookies
        //
        '$php_errormsg',//前一个错误信息
        '$HTTP_RAW_POST_DATA',//原生POST数据
        '$http_response_header',//HTTP 响应头
        '$argc',        //传递给脚本的参数数目
        '$argv',        //传递给脚本的参数数组
    );



    /*
     * IO 管道
     * void echo ( string $arg1 [, string $... ] )
     * int print ( string $arg )
     * int printf ( string $format [, mixed $args [, mixed $... ]] )
     * int vprintf ( string $format , array $args )
     * int vfprintf ( resource $handle , string $format , array $args )
     * string sprintf ( string $format [, mixed $args [, mixed $... ]] )
     * string vsprintf ( string $format , array $args )
     * mixed sscanf ( string $str , string $format [, mixed &$... ] )
     * mixed fscanf ( resource $handle , string $format [, mixed &$... ] )
     *
     */
    public static function var_dump($name){ var_dump($name); }//Dumps a string representation of an internal zend value to output
    public static function var_export($name,$return=false){ var_export($name,$return); }//输出或返回一个变量的字符串表示
    public static function debug_zval_dump($variable){ debug_zval_dump($variable); }//Dumps a string representation of an internal zend value to output
    // 文件 输出
    public static function readfile($filename,$use_include_path=false,$context){return readfile($filename,$use_include_path,$context);}//读取文件并写入到输出缓冲。

    /**
     * input
     */
    public static function filter_list(){return filter_list();}//返回所支持的过滤器列表
    const INPUT_GET                 = INPUT_GET;//
    const INPUT_POST                = INPUT_POST;//
    const INPUT_COOKIE              = INPUT_COOKIE;//
    const INPUT_SERVER              = INPUT_SERVER;//
    const INPUT_ENV                 = INPUT_ENV;//
    public static function filter_has_var($type,$variable_name){return filter_has_var($type,$variable_name);}//Checks if variable of specified type exists
    public static function filter_input($type,$variable_name,$filter=FILTER_DEFAULT,$options){return filter_input($type,$variable_name,$filter,$options);}//通过名称获取特定的外部变量，并且可以通过过滤器处理它
    public static function filter_input_array($type,$definition,$add_empty=true){return filter_input_array($type,$definition,$add_empty);}//获取一系列外部变量，并且可以通过过滤器处理它们
    const FILTER_VALIDATE_BOOLEAN   = FILTER_VALIDATE_BOOLEAN;//Returns TRUE for "1", "true", "on" and "yes". Returns FALSE otherwise.
    const FILTER_VALIDATE_FLOAT     = FILTER_VALIDATE_FLOAT;//float
    const FILTER_VALIDATE_INT       = FILTER_VALIDATE_INT;//integer
    const FILTER_VALIDATE_EMAIL     = FILTER_VALIDATE_EMAIL;//e-mail address
    const FILTER_VALIDATE_URL       = FILTER_VALIDATE_URL;//URL (SCHEME,HOST,PATH,QUERY)
    const FILTER_VALIDATE_IP        = FILTER_VALIDATE_IP;//IP address (IPV4,IPV6)
    const FILTER_VALIDATE_MAC       = FILTER_VALIDATE_MAC;//MAC address
    const FILTER_VALIDATE_REGEXP    = FILTER_VALIDATE_REGEXP;//a Perl-compatible regular expression.
    public static function filter_var($variable,$filter=FILTER_DEFAULT,$options){return filter_var($variable,$filter,$options);}//使用特定的过滤器过滤一个变量
    public static function filter_var_array($data,$definition,$add_empty=true){return filter_var_array($data,$definition,$add_empty);}//获取多个变量并且过滤它们

    /*
     * output
     */
    // 网络,文件相关输出参见 Streams
    // 输出控制
    public static function ob_get_level(){ return ob_get_level(); }//返回输出缓冲机制的嵌套级别
    public static function ob_get_status(){return ob_get_status($full_status=FALSE);}//得到所有输出缓冲区的状态
    public static function ob_implicit_flush($flag=true){ ob_implicit_flush($flag); }//设为TRUE 打开绝对刷送，反之是 FALSE
    // 输出缓冲
    public static function ob_start(){ return ob_start(); }//打开输出控制缓冲
    public static function flush(){ flush(); }//刷新输出缓冲
    public static function ob_flush(){ ob_flush(); }//冲刷出（送出）输出缓冲区中的内容
    public static function ob_clean(){ ob_clean(); }//丢弃输出缓冲区中的内容。
    public static function ob_get_length(){ return ob_get_length(); }//返回输出缓冲区内容的长度
    public static function ob_get_contents(){ return ob_get_contents(); }//返回输出缓冲区的内容
    public static function ob_get_flush(){ return ob_get_contents(); }//刷出（送出）缓冲区内容，以字符串形式返回内容，并关闭输出缓冲区。
    public static function ob_end_flush(){ return ob_end_clean(); }//冲刷出（送出）输出缓冲区内容并关闭缓冲
    public static function ob_end_clean(){ return ob_end_clean(); }//清空（擦除）缓冲区并关闭输出缓冲
    public static function ob_list_handlers(){ return ob_list_handlers(); }//列出所有使用中的输出处理程序。
    // 输出 压缩 编码
    public static function ob_gzhandler($buffer,$mode){ ob_gzhandler($buffer,$mode); }//在ob_start中使用的用来压缩输出缓冲区中内容的回调函数。ob_start callback public static function to gzip output buffer
    public static function ob_iconv_handler($contents,$status){ ob_iconv_handler($contents,$status); }//以输出缓冲处理程序转换字符编码
    public static function mb_output_handler($contents,$status){ mb_output_handler($contents,$status); }//在输出缓冲中转换字符编码的回调函数
    // 输出 URL重写器
    public static function output_add_rewrite_var($name,$value){return output_add_rewrite_var($name,$value);}//添加URL重写器的值
    public static function output_reset_rewrite_vars(){return output_reset_rewrite_vars();}//重设URL重写器的值
}