<?php
/**
 * 成员属性反射
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionProperty extends \ReflectionProperty implements \Reflector
{
    /** 常量
     * const integer IS_STATIC = 1 ;
     * const integer IS_PUBLIC = 256 ;
     * const integer IS_PROTECTED = 512 ;
     * const integer IS_PRIVATE = 1024 ;
     */

    public function __construct($class, $name){parent::__construct($class, $name);}
    public function __toString(){parent::__toString();}
    public static function export($class, $name, $return = null){parent::export($class, $name, $return);}

    public function getModifiers(){parent::getModifiers();}//Gets modifiers
    public function getName(){parent::getName();}//Gets property name
    public function getValue($object){parent::getValue($object);}//Gets value
    public function setValue($object, $value){parent::setValue($object, $value);}//Set property value
    public function setAccessible($accessible){parent::setAccessible($accessible);}//Set property accessibility
    //is
    public function isDefault(){parent::isDefault();}
    public function isStatic(){parent::isStatic();}
    public function isPublic(){parent::isPublic();}
    public function isProtected(){parent::isProtected();}
    public function isPrivate(){parent::isPrivate();}


    public function getDeclaringClass(){parent::getDeclaringClass();}//Gets declaring class
    public function getDocComment(){parent::getDocComment();}//Gets the property doc comment


}