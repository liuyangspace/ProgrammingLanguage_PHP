<?php
/*
 * php基础结构类型：类与对象
 * Class & Object 语法的结构形式是：
 *  默认情况下，所有可见属性都将被用于遍历。
 *  PHP 7 开始支持匿名类，可以创建一次性的简单对象。
 *  $var = new ClassName(),$var = new ClassName;
 * Reference:
 *  http://php.net/manual/zh/language.types.object.php
 *  http://php.net/manual/zh/language.oop5.php
 *  http://php.net/manual/zh/book.reflection.php
 */

namespace LanguageStatement\DataType;
require_once __DIR__.'/FunctionClass.php';

class ObjectClass extends PHPOOP
{

    /*
     * 转换为对象
     */
    public static function toObject($var){ return (object)$var; }

    /*
     * 判断是否为对象
     */
    public static function isObject($var){ return is_object($var); }

}

class PHPOOP extends PHPFunction
{

    /*
     * 类的载入 SPL
     */
    // void __autoload ( string $class )    尝试加载未定义的类
    public static function spl_autoload_register(callable $loadFunc,$throw=true,$prepend=false){ return spl_autoload_register($loadFunc,$throw,$prepend); }//注册给定的函数作为 __autoload 的实现

    /*
     * 类的信息
     */
    public static function class_alias($original,$alias,$autoload=TRUE){ return class_alias($original,$alias,$autoload); }//为一个类创建别名
    //  exists
    public static function class_exists($original,$autoload=TRUE){ return class_exists($original,$autoload); }//检查类是否已定义
    public static function method_exists($object,$method_name){ return method_exists($object,$method_name); }//检查类的方法是否存在
    public static function property_exists($object,$property){ return property_exists($object,$property); }//检查类的属性是否存在
    public static function interface_exists($interface_name,$autoload=TRUE){ return interface_exists($interface_name,$autoload); }//检查接口是否已被定义
    public static function trait_exists($traitname,$autoload){ return trait_exists($traitname,$autoload); }//检查指定的 trait 是否存在
    //  get
    public static function get_class($obj){ return get_class($obj); }//返回对象的类名
    public static function get_parent_class($obj){ return get_parent_class($obj); }//返回对象或类的父类名
    public static function get_called_class(){ return get_called_class(); }//后期静态绑定（"Late Static Binding"）类的名称
    public static function get_class_vars($className){ return get_class_vars($className); }//返回由类的默认属性组成的数组
    public static function get_object_vars($obj){ return get_object_vars($obj); }//返回由对象属性组成的关联数组
    public static function get_class_methods($className){ return get_class_methods($className); }//返回由类的方法名组成的数组
    public static function get_declared_classes(){ return get_declared_classes(); }//返回由已定义类的名字所组成的数组
    public static function get_declared_interfaces(){ return get_declared_interfaces(); }//返回一个数组包含所有已声明的接口
    public static function get_declared_traits(){ return get_declared_traits(); }//返回所有已定义的 traits 的数组
    //  is
    public static function is_a($object,$className,$allowString=FALSE){ return is_a($object,$className,$allowString); }//如果对象属于该类或该类是此对象的父类则返回 TRUE
    public static function is_subclass_of($object,$className){ return is_subclass_of($object,$className); }//如果此对象是该类的子类，则返回 TRUE
    // SPL class
    public static function spl_classes(){return spl_classes();}//返回所有可用的SPL类
    public static function spl_object_hash($obj){return spl_object_hash($obj);}//返回指定对象的hash id
    public static function class_uses($class,$autoload=true){return class_uses($class,$autoload);}//Return the traits used by the given class
    public static function class_parents($class,$autoload){return class_parents($class,$autoload);}//返回指定类的父类。
    public static function class_implements($class,$autoload){return class_implements($class,$autoload);}//返回指定的类实现的所有接口。
    /*
     * 已废弃 方法;
     *  mixed call_user_method_array ( string $method_name , object &$obj , array $paramarr )
     *  mixed call_user_method ( string $method_name , object &$obj [, mixed $parameter [, mixed $... ]] )
     */

}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/16
 * Time: 10:32
 */