<?php
/**
 * 函数反射
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionFunction extends \ReflectionFunction implements \Reflector //extends ReflectionFunctionAbstract
{

    public function __construct($name){parent::__construct($name);}
    public function __toString(){parent::__toString();}
    public static function export($name, $return = null){parent::export($name, $return);}

    public function getClosure(){parent::getClosure();}//Returns a dynamically created closure for the function
    public function invoke($args = null){parent::invoke($args);}//Invokes function
    public function invokeArgs(array $args){parent::invokeArgs($args);}//Invokes function args
    public function isDisabled(){parent::isDisabled();}//Checks if function is disabled


    /**
     * 继承的方法
     * final private void ReflectionFunctionAbstract::__clone ( void )
     * public ReflectionClass ReflectionFunctionAbstract::getClosureScopeClass ( void )
     * public object ReflectionFunctionAbstract::getClosureThis ( void )
     * public string ReflectionFunctionAbstract::getDocComment ( void )
     * public int ReflectionFunctionAbstract::getEndLine ( void )
     * public ReflectionExtension ReflectionFunctionAbstract::getExtension ( void )
     * public string ReflectionFunctionAbstract::getExtensionName ( void )
     * public string ReflectionFunctionAbstract::getFileName ( void )
     * public string ReflectionFunctionAbstract::getName ( void )
     * public string ReflectionFunctionAbstract::getNamespaceName ( void )
     * public int ReflectionFunctionAbstract::getNumberOfParameters ( void )
     * public int ReflectionFunctionAbstract::getNumberOfRequiredParameters ( void )
     * public array ReflectionFunctionAbstract::getParameters ( void )
     * public ReflectionType ReflectionFunctionAbstract::getReturnType ( void )
     * public string ReflectionFunctionAbstract::getShortName ( void )
     * public int ReflectionFunctionAbstract::getStartLine ( void )
     * public array ReflectionFunctionAbstract::getStaticVariables ( void )
     * public bool ReflectionFunctionAbstract::hasReturnType ( void )
     * public bool ReflectionFunctionAbstract::inNamespace ( void )
     * public bool ReflectionFunctionAbstract::isClosure ( void )
     * public bool ReflectionFunctionAbstract::isDeprecated ( void )
     * public bool ReflectionFunctionAbstract::isGenerator ( void )
     * public bool ReflectionFunctionAbstract::isInternal ( void )
     * public bool ReflectionFunctionAbstract::isUserDefined ( void )
     * public bool ReflectionFunctionAbstract::isVariadic ( void )
     * public bool ReflectionFunctionAbstract::returnsReference ( void )
     * abstract public void ReflectionFunctionAbstract::__toString ( void )
     */

}