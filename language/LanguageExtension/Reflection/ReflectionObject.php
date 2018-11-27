<?php
/**
 * 对象反射
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionObject extends \ReflectionObject implements \Reflector //extendsReflectionClass
{
    /**
     * 常量
     * const integer IS_IMPLICIT_ABSTRACT = 16 ;
     * const integer IS_EXPLICIT_ABSTRACT = 32 ;
     * const integer IS_FINAL = 64 ;
     */

    public function __construct($argument){parent::__construct($argument);}
    public static function export($argument, $return = null){parent::export($argument, $return);}

}