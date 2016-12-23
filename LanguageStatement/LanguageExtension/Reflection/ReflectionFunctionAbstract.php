<?php
/**
 * 函数反射
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionFunctionAbstract extends \ReflectionFunctionAbstract implements \Reflector
{


    public static function export(){parent::export();}
    public function __toString(){parent::__toString();}

    //is
    public function isDeprecated(){parent::isDeprecated();}//检查是否已经弃用
    public function isClosure(){parent::isClosure();}//检查是否是匿名函数
    public function isVariadic(){parent::isVariadic();}//判断函数是否是一个可变函数
    public function isGenerator(){parent::isGenerator();}//判断函数是否是一个生成器函数
    public function isInternal(){parent::isInternal();}//判断函数是否是内置函数
    public function isUserDefined(){parent::isUserDefined();}//检查是否是用户定义
    //闭包
    public function getClosureScopeClass(){parent::getClosureScopeClass();}//Returns the scope associated to the closure
    public function getClosureThis(){parent::getClosureThis();}//返回本身的匿名函数
    //Extension
    public function getExtension(){parent::getExtension();}//获取扩展信息
    public function getExtensionName(){parent::getExtensionName();}//获取扩展名称
    //Name Namespace
    public function getName(){parent::getName();}//获取函数名称
    public function getShortName(){parent::getShortName();}//获取函数短名称
    public function getNamespaceName(){parent::getNamespaceName();}//获取命名空间
    public function inNamespace(){parent::inNamespace();}//检查是否处于命名空间
    //Parameter
    public function getNumberOfParameters(){parent::getNumberOfParameters();}//获取参数数目
    public function getNumberOfRequiredParameters(){parent::getNumberOfRequiredParameters();}//获取必须输入参数个数
    public function getParameters(){parent::getParameters();}//获取参数
    public function getStaticVariables(){parent::getStaticVariables();}//获取静态变量
    //Return
    public function getReturnType(){parent::getReturnType();}//Gets the specified return type of a function
    public function hasReturnType(){parent::hasReturnType();}//Checks if the function has a specified return type
    public function returnsReference(){parent::returnsReference();}//检查是否返回参考信息
    //doc
    public function getDocComment(){parent::getDocComment();}//获取注释内容
    public function getFileName(){parent::getFileName();}//获取文件名称
    public function getStartLine(){parent::getStartLine();}//获取开始行号
    public function getEndLine(){parent::getEndLine();}//获取结束行号

    /**
     * 私有方法
     * final private void ReflectionFunctionAbstract::__clone ( void )
     */


}