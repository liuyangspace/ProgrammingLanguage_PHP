<?php
/**
 * 数据种类
 * 变量
 *  变量名由字母或者下划线开头，后面跟上任意数量的字母，数字，或者下划线。表述为：'[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*'。
 *  变量用一个美元符号后面跟变量名来表示。变量名是区分大小写的。
 *  $this 是一个特殊的变量，它不能被赋值。
 *  引用赋值,& 符号加到将要赋值的变量前（源变量）,只有有名字的变量才可以引用赋值。
 *  global 关键字:预定义变量需要用 'global' 关键字来使它们在函数的本地区域中有效
 *  $GLOBALS 是一个超全局变量,在全局范围内存在
 *  静态变量:仅在局部函数域中存在，当程序执行离开此作用域时，其值并不丢失。
 *  静态声明是在编译时解析的。
 *  可变变量:获取一个普通变量的值作为这个可变变量的变量名。$this,超全局变量不能用作可变变量。
 * 常量:一旦被定义，就不能再改变或者取消定义。
 *  合法的常量名以字母或下划线开始，后面跟着任何字母，数字或下划线。表述为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。
 *  常量默认为大小写敏感。
 *  常量的范围是全局的。
 * 类型比较：（按顺序）
 *  运算数 1 类型        运算数 2 类型        结果
 *  null 或 string      string              将 NULL 转换为 ""，进行数字或词汇比较
 *  bool 或 null        任何其它类型         转换为 bool，FALSE < TRUE
 *  object              object              ==：两个对象的属性和属性值 都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等。
 *                                          ===：两个对象变量一定要指向某个类的同一个实例（即同一个对象）。
 *  string，resource 或 number              将字符串和资源转换成数字，按普通数学比较
 *  array               array               具有较少成员的数组较小，如果运算数 1 中的键不存在于运算数 2 中则数组无法比较，否则挨个值比较
 *  object              任何其它类型         object 总是更大
 *  array               任何其它类型         array 总是更大
 *
 */


namespace LanguageStatement;

class DataType extends PHPDataType
{
    // php内置有关常量、函数见 父类
    /**
     * PHP 支持 8 种原始数据类型。
     */
    protected static $dataTypes = array(
        //四种标量类型
        'boolean',          'integer',          'float',            'string',
        //两种复合类型
        'array',            'object',
        //两种特殊类型
        'resource',         'null',
        //伪类型
        'mixed',            'number',           'callback',
    );

    /**
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

    /**
     * 获取 PHP 支持 8 种原始数据类型。
     * Array getTypes ()
     * @return array 支持 8 种原始数据类型。
     */
    public static function getTypes (){ return self::$dataTypes; }

    /**
     * 数据类型转换 其他参考(强制类型转换)
     * bool setType ( mixed &$var , string $type )
     * @param mixed $var 变量
     * @param string $type 目标类型 ['boolean','integer','float','string','array','object','null']
     * @return mixed 转换结果
     * @throws \Exception
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
    /**
     * PHP 封装的数据结构(队，栈，堆...),参见 LanguageExtension/SPL/DataStructure
     */

    // 数据打包
    public static function pack($format,...$args){return pack($format,...$args);}//Pack data into binary string
    public static function unpack($format,$data){}//Unpack data from binary string

    public static function uniqid($prefix="",$more_entropy=false){ return uniqid($prefix,$more_entropy); }//获取一个带前缀、基于当前时间微秒数的唯一ID。
    public static function serialize($var){ return serialize($var); }//产生一个可存储的值的表示
    public static function unserialize($str){ return unserialize($str); }//从已存储的表示中创建 PHP 的值
    // 变量
    public static function isset($name){ return isset($name); }//检测变量是否设置
    public static function unset($name){ unset($name); }//释放给定的变量
    public static function empty($name){ return empty($name); }//检查一个变量是否为空
    public static function var_dump(...$name){ var_dump(...$name); }//Dumps a string representation of an internal zend value to output
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
    /**
     * 得到一个易读懂的类型 参考：要查看某个类型，建议用 is_type 函数
     *  ['boolean','integer','double','string','array','object','resource','NULL','unknown type']
     */
    public static function gettype($var){ return gettype($var); }
    public static function settype(&$var,$type){ settype($var, $type); }

    /**
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

    public static function boolval( $var ){ return boolval($var); }
    public static function intval( $var ){ return intval($var); }
    public static function floatval( $var ){ return floatval($var); }
    public static function strval( $var ){ return strval($var); }
}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/9
 * Time: 10:32
 */