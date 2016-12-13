<?php

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/9
 * Time: 10:32
 * Description: php基础数据类型处理
 * Reference:
 *  http://php.net/manual/zh/language.types.intro.php
 */

namespace LanguageStatement;

class DataType
{
    /*
     * PHP 支持 8 种原始数据类型。
     */
    protected static $dataTypes = array(
        //四种标量类型
        'boolean',          'integer',          'float',            'string',
        //两种复合类型
        'array',            'object',
        //两种特殊类型
        'resource',         'NULL',
        //伪类型
        'mixed',            'number',           'callback',
    );

    /*
     * PHP 类型验证函数
     */
    protected static $isTypes = array(
        'is_array',
        'is_bool',
        'is_float',
        'is_integer',
        'is_null',
        'is_numeric',
        'is_object',
        'is_resource',
        'is_scalar',
        'is_string'
    );

    /*
     * 获取 PHP 支持 8 种原始数据类型。
     * Array getTypes ()
     * @return PHP 支持 8 种原始数据类型。
     */
    public static function getTypes (){
        return self::$dataTypes;
    }

    /*
     * 数据类型转换 其他参考(强制类型转换)
     * bool settype ( mixed &$var , string $type )
     * @param mixed $var 变量
     * @param string $type 目标类型 ['boolean','integer','float','string','array','object','null']
     * @return mixed 转换结果
     */
    public static function settype ($var, $type){
        $result = settype($var, $type);
        if($result){
            return $var;
        }else{
            throw new \Exception("PHP function settype(".$var.",'".$type."') is error !");
        }
    }

    /*
     * 得到一个易读懂的类型 参考：要查看某个类型，建议用 is_type 函数
     * is_array()、is_bool()、is_float()、is_integer()、is_null()、is_numeric()、is_object()、is_resource()、is_scalar() 和 is_string()
     * @param mixed $var 变量
     * @return string 目标类型
     *  ['boolean','integer','double','string','array','object','resource','NULL','unknown type']
     */
    public static function gettype ($var){
        return gettype($var);
    }

    /*
     * is_*()函数
     * bool is_*( mixed $var )
     * @return bool 如果是目标类型返回true，否则返回false
     */
    public static function isArray( $var ){ return is_array($var); }
    public static function isBool( $var ){ return is_bool($var); }
    public static function isBoolean( $var ){ return is_bool($var); }
    public static function isFloat( $var ){ return is_float($var); }
    public static function isDouble( $var ){ return is_float($var); }
    public static function isInt( $var ){ return is_int($var); }
    public static function isLong( $var ){ return is_int($var); }
    public static function isInteger( $var ){ return is_int($var); }
    public static function isNull( $var ){ return is_null($var); }
    public static function isNumeric( $var ){ return is_numeric($var); }
    public static function isObject( $var ){ return is_object($var); }
    public static function isClass( $var ){ return is_object($var); }
    public static function isResource( $var ){ return is_resource($var); }
    public static function isScalar( $var ){ return is_scalar($var); }
    public static function isString( $var ){ return is_string($var); }
    public static function isA( $object, $className, $allowString ){ return is_a($object, $className, $allowString); }

    public static function __callStatic ($name, $arguments)
    {
        // 处理 is_type() 调用
        if(in_array($name,self::$isTypes,true)){
            return $name($arguments[0]);
        }
        // 变通处理 is_type() 调用
        $isTypes = array(
            'is_int'=>'is_integer',
            'is_boolean'=>'is_bool',
            'is_double'=>'is_float',
            'is_class'=>'is_object',
        );
        if(array_key_exists($name,$isTypes)){
            return $isTypes[$name]($arguments[0]);
        }

        throw new \Exception('"'.$name.'()" is undefined static method !');
    }

}