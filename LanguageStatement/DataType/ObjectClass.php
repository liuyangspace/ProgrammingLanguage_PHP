<?php
/*
 * php基础结构类型：类与对象
 * 声明：
 *  类的定义都以关键字 class开头，后面跟着类名，后面跟着一对花括号，里面包含有类的属性与方法的定义。
 *  合法类名以字母或下划线开头，后面跟着若干字母，数字或下划线。表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。
 *  new：创建一个类的实例，在类定义内部，可以用 new self 和 new parent 创建新对象。
 *  extends：承另一个类的方法和属性。PHP不支持多重继承，一个类只能继承一个基类
 *  parent:来访问父类的(或被覆盖的)方法或属性
 *  final：类不能被继承，方法不可被覆盖
 *  ::class：ClassName::class 返回类 ClassName 的完全限定名称。
 *  属性声明：跟 heredocs不同，nowdocs可在任何静态数据上下文中使用，包括属性声明。(参见StringClass 字符串定义)
 *  类常量：常量的值必须是一个定值，不能是变量，类属性，数学运算的结果或函数调用。
 *  子类不会隐式调用其父类的构造函数/析构函数，如有需要，需要在子类的构造函数中调用 parent::__construct()/::__destruct()。
 *  与其它方法不同，子类可以用不同参数的__construct()覆盖父类__construct().(其它方法产生一个 E_STRICT )
 *  类成员定义为公有，受保护，私有之一,如果用 var(属性) 定义或未定义(方法)，默认为公有。
 *  同一个类的对象即使不是同一个实例也可以互相访问对方的私有与受保护成员。
 *  范围解析操作符（::）:用于访问静态成员，类常量，还可以用于覆盖类中的属性和方法(结合类名,self,parent,static使用).
 *  抽象类：含抽象方法的类，abstract 关键字。
 *  interface：接口间可继承（extends），类(包括抽象类)与接口间可实现（implements）
 *  实现多个接口时，接口中的方法不能有重名。
 *  Trait:一种代码复用机制。
 *      trait支持属性,方法,抽象方法的使用,可以被静态成员静态方法定义。
 *      类内部多个 trait，通过use 声明，用逗号分隔，多个 trait间可互相通过use 声明使用,
 *      多个trait的方法名在同一个类中冲突(重名)，需要使用 insteadof操作符和as(起别名)来明确指定使用冲突方法中的哪一个。
 *  对象被复制:会对对象的所有属性执行一个浅复制（shallow copy）。所有的引用属性 仍然会是一个指向原来的变量(实例)的引用。
 *      当复制完成时，新创建的对象（复制生成的对象）中的 __clone()方法会被调用，可用于修改属性的值（如复制引用属性，生成新变量(实例)）。
 *  静态绑定：static::不再被解析为定义当前方法所在的类，而是在实际运行时计算的。
 * 比较运算:
 *  比较运算符（==）比较两个对象变量时，比较的原则是：如果两个对象的属性和属性值 都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等。
 *  全等运算符（===），这两个对象变量一定要指向某个类的同一个实例（即同一个对象）。
 * 非对象转为对象：创建一个内置类 stdClass 的实例。
 *  值为 NULL，则新的实例为空。
 *  数组转换成对象将使键名成为属性名并具有相对应的值。
 *  任何其它的值，名为 scalar 的成员变量将包含该值。
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