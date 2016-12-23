<?php
/**
 * 反射（reflection）类
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class Reflection extends \Reflection
{
    //
    public static function export(Reflector $reflector, $return = false){parent::export($reflector, $return);}//导出一个反射（reflection）。
    public static function getModifierNames($modifiers){parent::getModifierNames($modifiers);}//修饰符名称的一个数组。
}