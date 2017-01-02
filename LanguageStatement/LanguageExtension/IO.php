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
        '',
        /*
         * 废弃
         * magic_quotes_runtime
         * magic_quotes_gpc
         */
    ];

    /*
     * output
     */
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