<?php
/**
 * php基础数据类型处理：整形和浮点型，整形非精确值，参考数学函数
 * number 语法的结构形式是：
 *  decimal     : [1-9][0-9]*
 *              | 0
 *  hexadecimal : 0[xX][0-9a-fA-F]+     //十六进制
 *  octal       : 0[0-7]+               // 八进制
 *  binary      : 0b[01]+               // 二进制
 *  integer     : [+-]?decimal
 *              | [+-]?hexadecimal
 *              | [+-]?octal
 *              | [+-]?binary
 *  LNUM          [0-9]+
 *  DNUM          ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
 *  EXPONENT_DNUM [+-]?(({LNUM} | {DNUM}) [eE][+-]? {LNUM})
 * 整型值可以使用十进制，十六进制，八进制或二进制表示，前面可以加上可选的符号（- 或者 +）。
 * 常量 NAN 代表着一个在浮点数运算中未定义或不可表述的值,此值与其它任何值进行的松散或严格比较的结果都是 FALSE。
 * NAN 代表着任何不同值，不应拿 NAN 去和其它值进行比较，包括其自身，应该用 is_nan() 来检查
 * Reference:
 *  http://php.net/manual/zh/language.types.boolean.php
 */

namespace LanguageStatement\DataType;

class Number extends PHPNumber
{
    // php内置有关常量、函数见 父类
    /**
     * 获取变量的数值
     */
    public static function toInt ( $var ){ return (int)$var; }
    public static function toInteger ( $var ){ return (int)$var; }
    public static function toFloat ( $var ){ return (float)$var; }
    public static function toDouble ( $var ){ return (float)$var; }

    /**
     * 数学函数
     */
    public static function add( $left, $right ){ return $left+$right; }
    public static function sub( $left, $right ){ return $left-$right; }
    public static function mul( $left, $right ){ return $left*$right; }
    public static function div( $left, $right ){ return (float)$left/$right; }
    public static function mod( $left, $right ){ return $left%$right; }

    /**
     * 判断是否为合法数值
     * bool is_nan ( float $val[ , boolean $isStrict = false ])
     * 如果 val 为“非数值”，例如 acos(1.01) 的结果，则返回 TRUE 。
     * @param float $var 要检查的值
     * @param boolean $isStrict 是否验证类型
     * @return boolean 如果 val 不是一个数字（not a number）返回 FALSE ，否则返回  TRUE。
     */
    public static function isNumber( $var , $isStrict = false ){
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

}

class PHPNumber
{
    const PHP_INT_SIZE  = PHP_INT_SIZE; //php整形字节数
    const PHP_INT_MAX   = PHP_INT_MAX;  //php整形最大值
    const PHP_INT_MIN   = PHP_INT_MIN;  //*
    const M_E           = M_E;          //
    const M_LOG2E       = M_LOG2E;      //
    const M_LOG10E      = M_LOG10E;     //
    const M_LN2         = M_LN2;        //
    const M_LN10        = M_LN10;       //
    const M_PI          = M_PI;         //圆周率的近似值。
    const M_PI_2        = M_PI_2;       //
    const M_PI_4        = M_PI_4;       //
    const M_2_SQRTPI    = M_2_SQRTPI;   //
    const M_SQRT2       = M_SQRT2;      //
    const M_SQRT1_2     = M_SQRT1_2;    //

    /**
     * 获取变量的数值
     */
    public static function intval ( $var , $base = 10 ){ return intval($var,$base); }//获取变量的整形值
    public static function floatval ( $var ){ return floatval($var); }//获取变量的浮点值
    public static function doubleval ( $var ){ return doubleval($var); }//floatval() 的别名

    /**
     * 进制变换
     */
    public static function baseConvert ( $string , $to = 16 , $from = 10){ return base_convert($string,$from,$to); }//任意进制之间转换数字
    public static function bindec  ( $string ){ return bindec($string); }//二进制转换为十进制
    public static function octdec  ( $string ){ return octdec($string); }//八进制转换为十进制
    public static function hexdec  ( $string ){ return hexdec($string); }//十六进制转换为十进制
    public static function decbin  ( $string ){ return decbin($string); }//十进制转换为二进制
    public static function decoct  ( $string ){ return decoct($string); }//十进制转换为八进制
    public static function dechex  ( $string ){ return dechex($string); }//十进制转换为十六进制

    /**
     * 基于 BCMath 的高精度算术运算
     */
    public static function bcscale ( $scale=0 ){ return bcscale ($scale); }//设置所有bc数学函数的默认小数点保留位数
    public static function bcadd( $left, $right, $scale=0 ){ return bcadd($left,$right,$scale); }//2个任意精度数字的加法计算
    public static function bcsub( $left, $right, $scale=0 ){ return bcsub($left,$right,$scale); }//2个任意精度数字的减法
    public static function bcmul( $left, $right, $scale=0 ){ return bcmul ($left,$right,$scale); }//2个任意精度数字乘法计算
    public static function bcpow( $left, $right, $scale=0 ){ return bcpow ($left,$right,$scale); }//任意精度数字的乘方
    public static function bcdiv( $left, $right, $scale=0 ){ return bcdiv ($left,$right,$scale); }//2个任意精度的数字除法计算
    public static function bcmod( $left, $modulus ){ return bcmod ($left,$modulus); }//对一个任意精度数字取模
    public static function bcpowmod( $left, $right, $modulus, $scale=0 ){ return bcpowmod($left,$right,$modulus,$scale); }//乘方取模
    public static function bcsqrt( $left, $scale=0 ){ return bcsqrt  ($left,$scale); }//任意精度数字的二次方根
    public static function bccomp( $left, $right, $scale=0 ){ return bccomp ($left,$right,$scale); }//比较两个任意精度的数字

    /**
     * 数学函数
     */
    // 算术运算
    public static function pi(){ return pi(); }//得到圆周率值
    public static function log( $float, $base= M_E ){ return log($float,$base); }//自然对数
    public static function log10( $float ){ return log10($float); }//以 10 为底的对数
    public static function log1p( $float ){ return log1p($float); }//返回 log(1 + number)，甚至当 number 的值接近零也能计算出准确结果
    public static function abs( $number ){ return abs($number); }//绝对值
    public static function max( $array ){ return max($array); }//找出最大值
    public static function min( $array ){ return min($array); }//找出最小值
    public static function pow( $base, $exp ){ return pow($base, $exp); }//指数表达式
    public static function sqrt( $float ){ return sqrt($float); }//平方根
    public static function exp( $float ){ return exp($float); }//计算 e 的指数
    public static function expm1( $float ){ return expm1($float); }//返回 exp(number) - 1，甚至当 number 的值接近零也能计算出准确结果
    public static function is_finite( $float ){ return is_finite($float); }//判断是否为有限值
    public static function is_infinite( $float ){ return is_infinite($float); }//判断是否为无限值
    public static function fmod( $floatX, $floatY ){ return fmod($floatX,$floatY); }//返回除法的浮点数余数
    public static function intdiv( $floatX, $floatY ){ return intdiv($floatX,$floatY); }//对除法结果取整
    // 约数
    public static function ceil( $float ){ return ceil($float); }//进一法取整
    public static function floor( $float ){ return floor($float); }//舍去法取整
    public static function round( $float, $precision=0, $mode = PHP_ROUND_HALF_UP ){ return round($float,$precision,$mode); }//对浮点数进行四舍五入
    // 随机数
    public static function rand(){ return rand(); }//产生一个随机整数
    public static function srand( $seed=null ){ srand($seed); }//播下随机数发生器种子
    public static function getrandmax(){ return getrandmax(); }//显示随机数最大的可能值
    public static function mtRand( $min=0, $max=PHP_INT_MAX ){ return mt_rand($min,$max); }//生成更好的随机数
    public static function mt_srand( $seed=null ){ mt_srand($seed); }//播下一个更好的随机数发生器种子
    public static function mt_getrandmax(){ return mt_getrandmax(); }//显示随机数最大的可能值
    public static function lcgValue(){ return lcg_value(); }//组合线性同余发生器,范围为 (0, 1) 的伪随机数。
    // 三角函数
    public static function sin( $float ){ return sin($float); }//正弦
    public static function sinh( $float ){ return sinh($float); }//双曲正弦
    public static function asin( $float ){ return asin($float); }//反正弦
    public static function asinh( $float ){ return asinh($float); }//反双曲正弦
    public static function cos( $float ){ return cos($float); }//余弦
    public static function cosh( $float ){ return cosh($float); }//双曲余弦
    public static function acos( $float ){ return acos($float); }//反余弦
    public static function acosh( $float ){ return acosh($float); }//反双曲余弦
    public static function tan( $float ){ return tan($float); }//正切
    public static function tanh( $float ){ return tanh($float); }//双曲正切
    public static function atan( $float ){ return atan($float); }//反正切
    public static function atan2( $floatX, $floatY ){ return atan2($floatX,$floatY); }//两个参数的反正切
    public static function hypot( $floatX, $floatY ){ return hypot($floatX,$floatY); }//计算一直角三角形的斜边长度
    // 角度 弧度
    public static function deg2rad( $float ){ return deg2rad($float); }//将角度转换为弧度
    public static function rad2deg( $float ){ return rad2deg($float); }//将弧度数转换为相应的角度数

    /**
     * 常用格式
     */
    public static function money_format( $format, $number){ return money_format($format,$number); }//
    public static function number_format( $number, $decimals=0, $dec_point='.', $thousands_sep = ','){ return number_format($number,$decimals,$dec_point,$thousands_sep); }//以千位分隔符方式格式化一个数字

}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12
 * Time: 10:32
 */