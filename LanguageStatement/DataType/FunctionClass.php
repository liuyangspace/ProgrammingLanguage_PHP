<?php
/**
 * php基础结构类型：Function 函数
 * 函数声明：
 *  任何有效的 PHP 代码都有可能出现在函数内部，包括其它函数和类定义。
 *  函数名以字母或下划线打头，后面跟字母，数字或下划线。表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*
 *  函数名是大小写无关的。
 *  PHP 中的所有函数和类都具有全局作用域，可以定义在一个函数之内而在之外调用，反之亦然。
 *  PHP 不支持函数重载，也不可能取消定义或者重定义已声明的函数。
 *  PHP 支持递归调用函数。
 * Function 语法的结构形式是：
 *  分类：内置函数，自定义函数，可变函数，匿名函数
 *  定义：
 *      function [ name ](...) [ use (...) ] {...}
 *  应用：
 *      function()
 *      object->method()
 *      $this->method()
 *      class::method()
 *      parent::method()
 *      self::method()
 *  PHP 支持按值传递参数（默认），通过引用传递参数(&)以及默认参数。也支持可变长度参数列表。
 *  默认参数:支持 标量,数组,NULL,常量表达式，不能是诸如变量，类成员，或者函数调用等。
 *  可变长度参数:由 ... 语法实现
 * 返回值: 可以返回任意类型。
 *  return(结束函数，若后跟值，返回值给调用者),
 *  yield(返回生成器，中断函数[保持函数状态]，若后跟值，返回值给调用者(通常为foreach))
 *  函数返回一个引用,必须在函数声明和指派返回值给一个变量时都使用引用运算符 &
 * 可变函数:
 *  可以用来实现回调函数，函数表,对象方法调用.
 *  当调用静态方法时，函数调用要比静态属性优先：
 *  可变函数不能用于例如 echo，print，unset()，isset()，empty()，include，require以及类似的语言结构。
 * 匿名函数:也叫闭包函数
 *  闭包函数也可以作为变量的值来使用。
 *  use:闭包可以从父作用域中继承变量。任何此类变量都应该用 use 语言结构传递进去。
 *  闭包的父作用域是定义该闭包的函数（不一定是调用它的函数）。
 * Reference:
 *  http://php.net/manual/zh/language.types.callable.php
 *  http://php.net/manual/zh/language.functions.php
 *  http://php.net/manual/zh/book.funchand.php
 */

namespace LanguageStatement\DataType;


class FunctionClass extends PHPFunction
{

}

class PHPFunction
{

    /**
     * 参数相关
     * mixed func_get_arg ( int $arg_num )   返回参数列表的某一项
     * array func_get_args ( void )          返回一个包含函数参数列表的数组
     * int func_num_args ( void )            Returns the number of arguments passed to the function
     */
    //
    public static function create_function($paramStr,$codeStr){ return create_function($paramStr,$codeStr); }//Create an anonymous (lambda-style) function
    public static function function_exists($functionName){ return function_exists($functionName); }//如果给定的函数已经被定义就返回 TRUE
    public static function get_defined_functions(){ return get_defined_functions(); }//Returns an array of all defined functions
    public static function register_shutdown_function($callback,$param1,$param2){ register_shutdown_function($callback,$param1,$param2); }//Register a function for execution on shutdown
    public static function register_tick_function($callback,$param1,$param2){ register_tick_function($callback,$param1,$param2); }//Register a function for execution on each tick
    public static function unregister_tick_function($functionName){ unregister_tick_function($functionName); }//De-register a function for execution on each tick
    //调用
    public static function call_user_func_array($callback,$paramArr){ return call_user_func_array($callback,$paramArr); }//调用回调函数，并把一个数组参数作为回调函数的参数
    public static function call_user_func($callback,$param1,$param2){ return call_user_func($callback,$param1,$param2); }//把第一个参数作为回调函数调用
    public static function forward_static_call_array($callback,$paramArr){ return forward_static_call_array($callback,$paramArr); }//Call a static method and pass the arguments as array
    public static function forward_static_call($callback,$param1,$param2){ return forward_static_call($callback,$param1,$param2); }//Call a static method

}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/15
 * Time: 11:20
 */