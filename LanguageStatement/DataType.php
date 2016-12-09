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
    public static $dataTypes = array(
        //四种标量类型
        'boolean',          'integer',          'float',            'string',
        //两种复合类型
        'array',            'object',
        //两种特殊类型
        'resource',         'NULL',
        //伪类型
        'mixed',            'number',           'callback',
    );

    /* 数据类型转换 其他参考(强制类型转换)
     * @param mixed $var 变量
     * @param string $type 目标类型 ['boolean','integer','float','string','array','object','null']
     * @return mixed 转换结果
     */
    public static function settype($var, $type){
        $result = settype($var, $type);
        if($result){
            return $var;
        }else{
            throw new \Exception("PHP function settype(".$var.",'".$type."') is error !");
        }
    }

    /* 得到一个易读懂的类型 参考：要查看某个类型，建议用 is_type 函数
     *  is_array()、is_bool()、is_float()、is_integer()、is_null()、is_numeric()、is_object()、is_resource()、is_scalar() 和 is_string()
     * @param mixed $var 变量
     * @return string 目标类型
     *  ['boolean','integer','double','string','array','object','resource','NULL','unknown type']
     */
    public static function gettype($var){
        return gettype($var);
    }

}