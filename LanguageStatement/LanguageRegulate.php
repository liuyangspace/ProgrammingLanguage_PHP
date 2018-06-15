<?php
/**
 * php基础：php 调控
 * php statement：
 *  变量名由字母或者下划线开头，后面跟上任意数量的字母，数字，或者下划线。
 * declare 代码执行指令：
 *  语法：declare (directive)  statement
 *  Tick（时钟周期）指令：
 *      在 declare 中的 directive 部分用 ticks=N 来指定，声明代码段中解释器每执行 N 条可计时的低级语句就会发生的事件
 *      每个 tick 中出现的事件是由 register_tick_function()/unregister_tick_function()来指定的。
 *  Encoding 指令：
 *      对每段脚本指定其编码方式。
 *      当和命名空间结合起来时 declare 的唯一合法语法是 declare(encoding='...').
 * Reference:
 *  http://php.net/manual/zh/langref.php
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */
declare(encoding = 'UTF-8'); // 指定脚本编码方式。
namespace LanguageStatement;

class LanguageRegulate
{

    public static function php_check_syntax($filename,&$error_message){ return php_check_syntax($filename,$error_message); }//检查PHP的语法（并执行）指定的文件
    /**
     * php 代码
     */
    public static function php_strip_whitespace($filename){ return php_strip_whitespace($filename); }//返回删除注释和空格后的PHP源码
    public static function highlight_file($filename,$return=false){ return highlight_file($filename,$return); }//语法高亮一个文件
    public static function show_source($filename,$return=false){ show_source($filename,$return); }//别名 highlight_file()
    public static function highlight_string($str,$return=false){ return highlight_string($str,$return); }//字符串的语法高亮

    public static function token_get_all($sourceCode){return token_get_all($sourceCode);}//将提供的源码按 PHP 标记进行分割
    public static function token_name($token){return token_name($token);}//获取提供的 PHP 解析器代号的符号名称
    /**
     * 流程控制
     */
    // 脚本文件 导入，引用
    public static function include($string){include $string;}//引入[指定目录/include_path/当前目录]下文件，或返回return的值
    public static function include_once($string){include_once $string;}//在脚本执行期间包含并运行指定文件,只会包含一次。
    public static function require($string){require $string;}//require在出错时产生 E_COMPILE_ERROR级别的错误。include产生警告（E_WARNING）.
    public static function require_once($string){require_once $string;}//
    public static function get_included_files(){return get_included_files();}//返回所有被 include、 include_once、 require 和 require_once的文件名。
    public static function get_required_files(){return get_required_files();}//别名 get_included_files()

}
