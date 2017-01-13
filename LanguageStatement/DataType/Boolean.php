<?php
/**
 * php基础数据类型处理:布尔类型
 *  要指定一个布尔值，使用关键字 TRUE 或 FALSE。两个都不区分大小写。
 * Reference:
 *  http://php.net/manual/zh/language.types.boolean.php
 */

namespace LanguageStatement\DataType;

class Boolean extends PHPBoolean
{
    // php内置有关常量、函数见 父类
    /**
     * PHP 弱比较下的false
     */
    protected static $falseType = array(
        false,      //布尔值 FALSE 本身
        0,          //整型值 0（零）
        0.0,        //浮点型值 0.0（零）
        '','0',     //空字符串，以及字符串 "0"
        array(),    //不包括任何元素的数组
                    //不包括任何成员变量的对象（仅 PHP 4.0 适用）
        null,NULL,  //特殊类型 NULL（包括尚未赋值的变量）
                    //从空标记生成的 SimpleXML 对象
    );

    /**
     * 获取弱比较下的false数组
     * Array getFalse()
     */
    public static function getFalseType(){ return self::$falseType; }

    /**
     * 类型转换为boolean
     */
    public static function toBoolean ( $var ){ return (boolean)$var; }
    public static function toBool ( $var ){ return (bool)$var; }

    /**
     * 常用逻辑运算
     */
    public static function getAnd( $varLeft , $varRight ){ return $varLeft and $varRight;}//与
    public static function getOr( $varLeft , $varRight ){ return $varLeft or $varRight;}//或
    public static function getXor( $varLeft , $varRight ){ return $varLeft xor $varRight;}//异或
    public static function getNot( $var ){ return !$var;}//非
}

class PHPBoolean
{
    /**
     * 类型判断是否为boolean
     */
    public static function isBoolean ( $var ){ return is_bool($var); }
    public static function is_bool ( $var ){ return is_bool($var); }

    /**
     * 类型转换为boolean
     */
    public static function boolval( $var ){ return boolval($var); }
}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12
 * Time: 10:32
 */