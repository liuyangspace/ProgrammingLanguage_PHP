<?php
/**
 * ReflectionClass 类报告了一个类的有关信息。
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionClass extends \ReflectionClass
{
    /** 常量
     * const integer IS_IMPLICIT_ABSTRACT = 16 ;
     * const integer IS_EXPLICIT_ABSTRACT = 32 ;
     * const integer IS_FINAL = 64 ;
     */

    public function __construct($argument)
    {
        parent::__construct($argument);
    }

    // 类 接口
    public function getModifiers(){parent::getModifiers();}//返回 修饰符常量 的位掩码。 (final.abstract)
    public function getName(){parent::getName();}//获取类名
    public function getShortName(){parent::getShortName();}//获取类的短名，就是不含命名空间（namespace）的那一部分。
    public function getNamespaceName(){parent::getNamespaceName();}//获取命名空间的名称
    public function inNamespace(){parent::inNamespace();}//检查是否位于命名空间中
    public function getParentClass(){parent::getParentClass();}//获取命名空间（namespace）的名称。
    //  new
    public function newInstance($args = null, $_ = null){parent::newInstance($args, $_);}//从指定的参数创建一个新的类实例
    public function newInstanceArgs(array $args = null){parent::newInstanceArgs($args);}//从给出的参数创建一个新的类实例。
    public function newInstanceWithoutConstructor(){parent::newInstanceWithoutConstructor();}//创建一个新的类实例而不调用它的构造函数
    // is
    public function isAbstract(){parent::isAbstract();}//检查类是否是抽象类（abstract）
    public function isInterface(){parent::isInterface();}//检查类是否是一个接口（interface）。
    public function isTrait(){parent::isTrait();}//返回了是否为一个 trait
    public function isFinal(){parent::isFinal();}//检查类是否声明为 final
    public function isSubclassOf($class){parent::isSubclassOf($class);}//检查是否为一个子类
    public function isAnonymous(){parent::isAnonymous();}//检查类是否是匿名类
    public function isCloneable(){parent::isCloneable();}//返回了一个类是否可复制
    public function isInstance($object){parent::isInstance($object);}//检查类的实例
    public function isInstantiable(){parent::isInstantiable();}//检查对象是否为一个类的实例。
    public function isInternal(){parent::isInternal();}//检查类是否由扩展或核心在内部定义
    public function isIterateable(){parent::isIterateable();}//检查是否可迭代（iterateable）
    public function isUserDefined(){parent::isUserDefined();}//检查是否由用户定义的
    //Interfaces
    public function getInterfaces(){parent::getInterfaces();}//获取接口,接口的关联数组，数组键是接口（interface）的名称，数组的值是 ReflectionClass 对象。
    public function getInterfaceNames(){parent::getInterfaceNames();}//获取接口（interface）名称,一个数值数组，接口（interface）的名称是数组的值。
    public function implementsInterface($interface){parent::implementsInterface($interface);}//接口的实现
    //Traits
    public function getTraits(){parent::getTraits();}//返回这个类所使用的 traits 数组
    public function getTraitAliases(){parent::getTraitAliases();}//返回 trait 别名的一个数组
    public function getTraitNames(){parent::getTraitNames();}//返回这个类所使用 traits 的名称的数组
    //常量 Constant
    public function getConstant($name){parent::getConstant($name);}//获取定义过的一个常量的值。
    public function getConstants($name){parent::getConstants();}//获取定义过的常量的数组，常量名是数组的键，常量的值是数组的值。
    public function hasConstant($name){parent::hasConstant($name);}//检查常量是否已经定义
    //属性 properties
    public function getProperty($name){parent::getProperty($name);}//获取类的一个属性的 ReflectionProperty。
    public function getProperties($filter = null){parent::getProperties($filter);}//获取一组ReflectionProperty 对象的数组。
    public function hasProperty($name){parent::hasProperty($name);}//检查属性是否已定义
    public function getStaticProperties(){parent::getStaticProperties();}//获取静态（static）属性
    public function getStaticPropertyValue($name, $default = null){parent::getStaticPropertyValue($name, $default);}//获取静态（static）属性的值
    public function setStaticPropertyValue($name, $value){parent::setStaticPropertyValue($name, $value);}//设置静态属性的值
    public function getDefaultProperties(){parent::getDefaultProperties();}//默认属性的数组，其键是属性的名称，其值是属性的默认值或者在属性没有默认值时是 NULL。
    //函数 metho
    public function getConstructor(){parent::getConstructor();}//获取类的构造函数
    public function getMethod($name){parent::getMethod($name);}//获取一个类方法的 ReflectionMethod。
    public function getMethods($filter = null){parent::getMethods($filter);}//获取方法的数组,
    public function hasMethod($name){parent::hasMethod($name);}//检查方法是否已定义
    //注释 行数
    public function getExtension(){parent::getExtension();}//获取已定义类的扩展的 ReflectionExtension 对象。
    public function getExtensionName(){parent::getExtensionName();}//获取定义的类所在的扩展的名称
    public function getFileName(){parent::getFileName();}//获取类被定义的文件的文件名。
    public function getDocComment(){parent::getDocComment();}//获取文档注释
    public function getStartLine(){parent::getStartLine();}//获取起始行号
    public function getEndLine(){parent::getEndLine();}//获取最后一行的行数
    public function __toString(){parent::__toString();}//返回 ReflectionClass 对象字符串的表示形式。
    //静态
    public static function export($argument, $return = false){parent::export($argument, $return);}//导出一个反射后的类。

}