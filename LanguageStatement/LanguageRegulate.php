<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/14
 * Time: 14:41
 */

namespace LanguageStatement;


class LanguageRegulate
{
    public static function php_eval($str=null){ return eval($str); }//把字符串作为PHP代码执行
    // public static function php_check_syntax($filename,&$error_message){ return php_check_syntax($filename,$error_message); }//检查PHP的语法（并执行）指定的文件

    /*
     * php 代码
     */
    public static function php_strip_whitespace($filename){ return php_strip_whitespace($filename); }//返回删除注释和空格后的PHP源码
    public static function highlight_file($filename,$return=false){ return highlight_file($filename,$return); }//语法高亮一个文件
    public static function show_source($filename,$return=false){ show_source($filename,$return); }//别名 highlight_file()
    public static function highlight_string($str,$return=false){ return highlight_string($str,$return); }//字符串的语法高亮

    /*
     * 流程控制
     */
    public static function ini_get($name){ return ini_get($name); }//获取一个配置选项的值
    public static function ini_set($name,$value){ return ini_set($name,$value); }//为一个配置选项设置值
    public static function set_time_limit($seconds){ set_time_limit($seconds); }//设置脚本最大执行时间
    public static function sys_getloadavg(){ return sys_getloadavg(); }//获取系统的负载（load average）
    //延迟 中断
    public static function sleep($seconds){ return sleep($seconds); }//延迟:秒数。
    public static function usleep($seconds){ usleep($seconds); }//延迟:微秒。
    public static function time_nanosleep($seconds,$nanoseconds){ return time_nanosleep($seconds,$nanoseconds); }//延迟:纳秒。
    public static function time_sleep_until($timestamp){ return time_sleep_until($timestamp); }//使脚本睡眠到指定的时间为止。
    public static function php_exit($str=null){ return exit($str); }//输出一个消息并且退出当前脚本
    public static function php_die($str=null){ return die($str); }//输出一个消息并且退出当前脚本
    //public static function __halt_compiler(){ return __halt_compiler(); }//中断编译器的执行
    //客户端 浏览器
    public static function connection_aborted(){ return connection_aborted(); }//检查客户端是否已经断开
    public static function connection_status(){ return connection_status(); }//获得当前连接的状态位。
    public static function ignore_user_abort(){ return ignore_user_abort(); }//设置客户端断开连接时是否中断脚本的执行
    public static function get_browser($user_agent,$return_array=false){ return get_browser($user_agent,$return_array); }//通过查找 browscap.ini 文件中的浏览器信息，尝试检测用户的浏览器所具有的功能。


    //session

    //cookie

    //时区

    //错误

    //内存

    // PHP Manual›输出控制›Output Control 函数
    public static function flush(){ flush(); }//刷新输出缓冲
    public static function ob_start(){ return ob_start(); }//返回输出缓冲区的内容
    public static function ob_get_contents(){ return ob_get_contents(); }//返回输出缓冲区的内容
    public static function ob_get_flush(){ return ob_get_contents(); }//刷出（送出）缓冲区内容，以字符串形式返回内容，并关闭输出缓冲区。
    public static function ob_end_clean(){ return ob_end_clean(); }//返回输出缓冲区的内容
    public static function ob_end_flush(){ return ob_end_clean(); }//冲刷出（送出）输出缓冲区内容并关闭缓冲
    public static function ob_list_handlers(){ return ob_list_handlers(); }//列出所有使用中的输出处理程序。
    public static function ob_flush(){ ob_flush(); }//冲刷出（送出）输出缓冲区中的内容
    public static function ob_gzhandler($buffer,$mode){ ob_gzhandler($buffer,$mode); }//在ob_start中使用的用来压缩输出缓冲区中内容的回调函数。ob_start callback function to gzip output buffer
    public static function ob_implicit_flush($flag=true){ ob_implicit_flush($flag); }//冲刷出（送出）输出缓冲区中的内容
    public static function ob_iconv_handler($contents,$status){ ob_iconv_handler($contents,$status); }//以输出缓冲处理程序转换字符编码


    /*
    exec,system, passthru()
    */

}