<?php
/**
 * 函数参数反射
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionParameter extends \ReflectionParameter implements \Reflector
{

    public function __construct($function, $parameter){parent::__construct($function, $parameter);}
    public function __toString(){parent::__toString();}
    public static function export($function, $parameter, $return = null){parent::export($function, $parameter, $return);}

    //  is
    public function hasType(){parent::hasType();}//Checks if parameter has a type
    public function isArray(){parent::isArray();}//Checks if parameter expects an array
    public function isCallable(){parent::isCallable();}//Returns whether parameter MUST be callable
    public function isVariadic(){parent::isVariadic();}//Checks if a default value is available
    public function isDefaultValueAvailable(){parent::isDefaultValueAvailable();}//Checks if a default value is available
    public function isDefaultValueConstant(){parent::isDefaultValueConstant();}//Returns whether the default value of this parameter is constant
    public function isOptional(){parent::isOptional();}//Checks if optional
    public function isPassedByReference(){parent::isPassedByReference();}//Checks if passed by reference
    //
    public function allowsNull(){parent::allowsNull();}//Checks if null is allowed
    public function canBePassedByValue(){parent::canBePassedByValue();}//Returns whether this parameter can be passed by value
    public function getClass(){parent::getClass();}//获取参数所属类（参数前的类型限定修饰）的反射
    public function getType(){parent::getType();}//Gets a parameter's type
    public function getName(){parent::getName();}//Gets parameter name
    public function getDefaultValue(){parent::getDefaultValue();}//Gets default parameter value
    public function getDefaultValueConstantName(){parent::getDefaultValueConstantName();}//Returns the default value's constant name if default value is constant or null
    //
    public function getPosition(){parent::getPosition();}//Gets parameter position
    public function getDeclaringFunction(){parent::getDeclaringFunction();}//获取参数的函数的反射
    public function getDeclaringClass(){parent::getDeclaringClass();}//获取参数的函数的类的反射

    /**
     * final private void ReflectionParameter::__clone ( void )
     *
     */

}