<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\DataType;


trait Debug
{
    /**
     * __debugInfo
     * This method is called by var_dump() when dumping an object to get the properties that should be shown. If the
     * method isn't defined on an object, then all public, protected and private properties will be shown.This feature
     * was added in PHP 5.6.0.
     */
    public function __debugInfo()
    {
        // TODO: Implement __debugInfo() method.
    }

    /**
     * __set_state()
     * static object __set_state ( array $properties )
     * 自 PHP 5.1.0 起当调用 var_export() 导出类时，此静态 方法会被调用。
     * 本方法的唯一参数是一个数组，其中包含按 array('property' => value, ...) 格式排列的类属性。
     * Example #4 使用 __set_state()>（PHP 5.1.0 起）
     */
    public static function __set_state(array $properties)
    {
        // TODO: Implement __set_state() method.
    }
}