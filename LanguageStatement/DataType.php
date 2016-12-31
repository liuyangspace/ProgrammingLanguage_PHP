<?php



namespace LanguageStatement;

class DataType extends PHPDataType
{// php内置有关常量、函数见 父类
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
    public static function getTypes (){ return self::$dataTypes; }

    /*
     * 数据类型转换 其他参考(强制类型转换)
     * bool settype ( mixed &$var , string $type )
     * @param mixed $var 变量
     * @param string $type 目标类型 ['boolean','integer','float','string','array','object','null']
     * @return mixed 转换结果
     */
    public static function setType (&$var, $type){
        $result = settype($var, $type);
        if($result){
            return $var;
        }else{
            throw new \Exception("PHP function settype(".$var.",'".$type."') is error !");
        }
    }
}

class PHPDataType
{
    // string pack ( string $format [, mixed $args [, mixed $... ]] )
    // array unpack ( string $format , string $data )

    public static function uniqid($prefix="",$more_entropy=false){ return uniqid($prefix,$more_entropy); }//获取一个带前缀、基于当前时间微秒数的唯一ID。
    public static function serialize($var){ return serialize($var); }//产生一个可存储的值的表示
    public static function unserialize($str){ return unserialize($str); }//从已存储的表示中创建 PHP 的值
    // 变量
    public static function isset($name){ return isset($name); }//检测变量是否设置
    public static function unset($name){ unset($name); }//释放给定的变量
    public static function empty($name){ return empty($name); }//检查一个变量是否为空
    public static function var_dump($name){ var_dump($name); }//Dumps a string representation of an internal zend value to output
    public static function var_export($name,$return=false){ var_export($name,$return); }//输出或返回一个变量的字符串表示
    public static function debug_zval_dump($variable){ debug_zval_dump($variable); }//Dumps a string representation of an internal zend value to output
    public static function get_defined_vars(){ return get_defined_vars(); }//返回由所有已定义变量所组成的数组
    public static function import_request_variables($types,$prefix){ return import_request_variables($types,$prefix); }//将 GET／POST／Cookie 变量导入到全局作用域中
    // 常量
    public static function define($name,$value,$case_insensitive=false){ return define($name,$value,$case_insensitive); }//定义一个常量
    public static function defined($name){ return defined($name); }//检查某个名称的常量是否存在
    public static function get_defined_constants($categorize=false){ return get_defined_constants($categorize); }//返回所有常量的关联数组，键是常量名，值是常量值
    public static function constant($name){ return constant($name); }//返回一个常量的值
    // 资源（resource）
    public static function get_resource_type($handle){ return get_resource_type($handle); }//返回资源（resource）类型
    public static function get_resources($type){ return get_resources($type); }//Returns active resources
    /*
     * 得到一个易读懂的类型 参考：要查看某个类型，建议用 is_type 函数
     *  ['boolean','integer','double','string','array','object','resource','NULL','unknown type']
     */
    public static function gettype($var){ return gettype($var); }
    public static function settype(&$var,$type){ settype($var, $type); }

    /*
     * is_*()函数,以下是php函数简单封装，建议使用php内置函数以提高效率
     * bool is_*( mixed $var )
     * @return bool 如果是目标类型返回true，否则返回false
     */
    public static function is_array( $var ){ return is_array($var); }
    public static function is_bool( $var ){ return is_bool($var); }
    public static function is_callable( $var ){ return is_callable($var); }
    public static function is_float( $var ){ return is_float($var); }
    public static function is_double( $var ){ return is_double($var); }
    public static function is_real( $var ){ return is_real($var); }
    public static function is_int( $var ){ return is_int($var); }
    public static function is_long( $var ){ return is_long($var); }
    public static function is_integer( $var ){ return is_integer($var); }
    public static function is_null( $var ){ return is_null($var); }
    public static function is_numeric( $var ){ return is_numeric($var); }
    public static function is_object( $var ){ return is_object($var); }
    public static function is_resource( $var ){ return is_resource($var); }
    public static function is_scalar( $var ){ return is_scalar($var); }
    public static function is_string( $var ){ return is_string($var); }
    public static function is_a( $object, $className, $allowString = FALSE ){ return is_a($object, $className, $allowString); }
}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/9
 * Time: 10:32
 */