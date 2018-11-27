<?php
/**
 * 方法反射
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionMethod extends \ReflectionMethod implements Reflector //extends ReflectionFunctionAbstract
{
    /**
     * 常量
     * const integer IS_STATIC = 1 ;
     * const integer IS_PUBLIC = 256 ;
     * const integer IS_PROTECTED = 512 ;
     * const integer IS_PRIVATE = 1024 ;
     * const integer IS_ABSTRACT = 2 ;
     * const integer IS_FINAL = 4 ;
     */

    public function __construct($class, $name){parent::__construct($class, $name);}//
    public function __toString(){parent::__toString();}
    public static function export($class, $name, $return = false){parent::export($class, $name, $return);}

    //
    public function getClosure($object){parent::getClosure($object);}//返回一个动态建立的方法调用接口
    public function getDeclaringClass(){parent::getDeclaringClass();}//获取反射函数调用参数的类表达
    public function getModifiers(){parent::getModifiers();}//返回一个方法的修饰符，返回值是一个位标
    public function getPrototype(){parent::getPrototype();}//返回方法原型 (如果存在)
    public function invoke($object, $parameter = null, $_ = null){parent::invoke($object, $parameter, $_);}//Invoke
    public function invokeArgs($object, array $args){parent::invokeArgs($object, $args);}//带参数执行
    public function setAccessible($accessible){parent::setAccessible($accessible);}//设置方法是否可以访问，例如通过设置可以访问能够执行私有方法和保护方法
    //is
    public function isAbstract(){parent::isAbstract();}//判断方法是否是抽象方法
    public function isConstructor(){parent::isConstructor();}//判断方法是否是构造方法
    public function isDestructor(){parent::isDestructor();}//判断方法是否是析构方法
    public function isFinal(){parent::isFinal();}//判断方法是否定义 final
    public function isStatic(){parent::isStatic();}//判断方法是否是静态方法
    public function isPublic(){parent::isPublic();}//判断方法是否是公开方法
    public function isProtected(){parent::isProtected();}//判断方法是否是保护方法 (protected)
    public function isPrivate(){parent::isPrivate();}//判断方法是否是私有方法

}