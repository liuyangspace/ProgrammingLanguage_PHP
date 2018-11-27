<?php
/**
 * 可导出的反射类接口
 */

namespace LanguageStatement\LanguageExtension\Reflection;


interface Reflector extends \Reflector
{

    public static function export();
    public function __toString();

}