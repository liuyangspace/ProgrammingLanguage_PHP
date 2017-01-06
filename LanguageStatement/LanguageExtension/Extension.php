<?php
/**
 * PHP 扩展
 */

namespace LanguageStatement\LanguageExtension;


class Extension
{
    // Reflection 类
    //PHP 扩展
    public static function dl($library){return dl($library);}//载入指定参数 library 的 PHP 扩展。
    public static function extension_loaded($name){return extension_loaded($name);}//检查一个扩展是否已经加载。
    public static function get_extension_funcs($module_name){return get_extension_funcs($module_name);}//该函数根据 module_name 返回模块内定义的所有函数的名称。
    public static function get_loaded_extensions($zend_extensions=false){return get_extension_funcs($zend_extensions);}//返回所有编译并加载模块名的 array

}