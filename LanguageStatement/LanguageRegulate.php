<?php
/*
 * php基础：php 选项
 * php statement：
 *  变量名由字母或者下划线开头，后面跟上任意数量的字母，数字，或者下划线。
 * Reference:
 *  http://php.net/manual/zh/langref.php
 */

namespace LanguageStatement;


class LanguageRegulate
{

    //
    public static function eval($str=null){ return eval($str); }//把字符串作为PHP代码执行
    //public static function php_check_syntax($filename,&$error_message){ return php_check_syntax($filename,$error_message); }//检查PHP的语法（并执行）指定的文件

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
    // 脚本文件 导入，引用

    public static function include($string){include $string;}//引入[指定目录/include_path/当前目录]下文件，或返回return的值
    public static function include_once($string){include_once $string;}//在脚本执行期间包含并运行指定文件,只会包含一次。
    public static function require($string){require $string;}//require在出错时产生 E_COMPILE_ERROR级别的错误。include产生警告（E_WARNING）.
    public static function require_once($string){require_once $string;}//
    public static function get_included_files(){return get_included_files();}//返回所有被 include、 include_once、 require 和 require_once的文件名。
    public static function get_required_files(){return get_required_files();}//别名 get_included_files()
    // 脚本文件 时间
    public static function set_time_limit($seconds){ set_time_limit($seconds); }//设置脚本最大执行时间
    public static function getlastmod(){return getlastmod();}//获取执行的主脚本的最后修改时间。
    //debug 调试
    public static function assert_options($key,$value){return assert_options($key,$value);}// 设置断言标志
    public static function assert($assertion,$exception){return assert($assertion,$exception);}//检查指定的 assertion 并在结果为 FALSE 时采取适当的行动。
    //延迟 中断
    public static function sleep($seconds){ return sleep($seconds); }//延迟:秒数。
    public static function usleep($seconds){ usleep($seconds); }//延迟:微秒。
    public static function time_nanosleep($seconds,$nanoseconds){ return time_nanosleep($seconds,$nanoseconds); }//延迟:纳秒。
    public static function time_sleep_until($timestamp){ return time_sleep_until($timestamp); }//使脚本睡眠到指定的时间为止。
    public static function php_exit($str=null){ return exit($str); }//输出一个消息并且退出当前脚本
    public static function php_die($str=null){ return die($str); }//输出一个消息并且退出当前脚本
    //public static public static function __halt_compiler(){ return __halt_compiler(); }//中断编译器的执行
    //客户端 浏览器
    public static function connection_aborted(){ return connection_aborted(); }//检查客户端是否已经断开
    public static function connection_status(){ return connection_status(); }//获得当前连接的状态位。
    public static function ignore_user_abort(){ return ignore_user_abort(); }//设置客户端断开连接时是否中断脚本的执行
    public static function get_browser($user_agent,$return_array=false){ return get_browser($user_agent,$return_array); }//通过查找 browscap.ini 文件中的浏览器信息，尝试检测用户的浏览器所具有的功能。


    //session

    //cookie


    //错误 与 异常
    //set_error_handler



    /*
    exec,system, passthru()
    */
}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12
 * Time: 10:32
 */