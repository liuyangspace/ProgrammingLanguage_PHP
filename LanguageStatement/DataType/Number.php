<?php
/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12
 * Time: 10:32
 * Description: php基础数据类型处理：整形和浮点型，整形非精确值，参考数学函数
 *  integer 语法的结构形式是：
    decimal     : [1-9][0-9]*
                | 0
    hexadecimal : 0[xX][0-9a-fA-F]+
    octal       : 0[0-7]+
    binary      : 0b[01]+
    integer     : [+-]?decimal
                | [+-]?hexadecimal
                | [+-]?octal
                | [+-]?binary
    LNUM          [0-9]+
    DNUM          ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
    EXPONENT_DNUM [+-]?(({LNUM} | {DNUM}) [eE][+-]? {LNUM})
 * Reference:
 *  http://php.net/manual/zh/language.types.boolean.php
 */

namespace LanguageStatement\DataType;

class Number
{
    /*
     * PHP 整形字节数
     */
    const IntSize = PHP_INT_SIZE;

    /*
     * PHP 整形最大值
     */
    const IntMax = PHP_INT_MAX;

    /*
     * 判断是否为合法数值
     * bool is_nan ( float $val[ , boolean $isStrict = false ])
     * 如果 val 为“非数值”，例如 acos(1.01) 的结果，则返回 TRUE 。
     * @param $var 要检查的值
     * @param $isStrict 是否验证类型
     * @return 如果 val 不是一个数字（not a number）返回 FALSE ，否则返回  TRUE。
     */
    public static function isNumber ( $var , $isStrict = false ){
        if($isStrict){
            if(is_float($var) || is_integer($var)){
                return !is_nan ($var);
            }else{
                return false;
            }
        }else{
            return is_numeric($var);
        }
    }

    /*
     * 获取变量的整数值
     * int intval ( mixed $var [, int $base = 10 ] )
     * 通过使用指定的进制 base 转换（默认是十进制），返回变量 var的 integer 数值。 intval() 不能用于 object，否则会产生 E_NOTICE 错误并返回 1。
     * @param $var 要转换成 integer 的数量值
     * @param $base 转化所使用的进制
     * @return 成功时返回 var 的 integer 值，失败时返回 0。 空的 array 返回 0，非空的 array 返回 1。
     */
    public static function intval ( $var , $base = 10 ){
        return intval($var,$base);
    }

    /*
     * 获取变量的浮点值
     * float floatval ( mixed $var )
     * 返回变量 var的 float 数值。
     * @param $var 要转换成 float 的数量值,var 可以是任何标量类型。你不能将 floatval() 用于数组或对象。
     * @return 成功时返回 var 的 float 值，失败时返回 0。
     */
    public static function floatval ( $var ){
        return floatval($var);
    }

    /*
     * 在任意进制之间转换数字
     * string conversion ( string $var , int $to , int $from  )
     * 返回一字符串，包含 $var 以 $to 进制的表示。
     * @param $var 要转换的数字
     * @param $to 目标进制
     * @param $from 源进制
     * @return number converted to base tobase
     * 参考：
     *  bindec() - 二进制转换为十进制
     *  decoct() - 十进制转换为八进制
     *  dechex() - 十进制转换为十六进制
     *  base_convert() - 在任意进制之间转换数字
     *  decbin() — 十进制转换为二进制
     *  dechex() — 十进制转换为十六进制
     */
    public static function conversion ( $var , $to = 10 , $from = 10){
        $var=(string)$var;
        $to=(int)$to;
        $from=(int)$from;
        return base_convert($var,$from,$to);
    }

    /*
     * 基于 BCMath 的算术运算
     */
    public static function getAdd( $left, $right, $scale=null ){
        if( $scale===null ){
            return bcadd($left,$right);
        }else{
            return bcadd($left,$right,$scale);
        }
    }

}

class Math{

    /*
     * 数学扩展
BC Math
GMP
Lapack
Math
Statistics
Trader
     */
}