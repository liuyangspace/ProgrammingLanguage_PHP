<?php
/*
 * php基础结构类型：Function 函数
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
 *  PHP 支持按值传递参数（默认），通过引用传递参数以及默认参数。也支持可变长度参数列表。
 *  可变函数不能用于例如 echo，print，unset()，isset()，empty()，include，require以及类似的语言结构。
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

    /*
     *
     */
    //参数
    //mixed func_get_arg ( int $arg_num )   返回参数列表的某一项
    //array func_get_args ( void )          返回一个包含函数参数列表的数组
    //int func_num_args ( void )            Returns the number of arguments passed to the function

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
 * Description: php基础结构类型：Function 函数
 * Reference:
 *  http://php.net/manual/zh/language.types.callable.php
 *  http://php.net/manual/zh/language.functions.php
 *  http://php.net/manual/zh/book.funchand.php
 */