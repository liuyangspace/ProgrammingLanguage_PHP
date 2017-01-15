<?php
/**
 * SPL Standard PHP Library,PHP标准库
 */

namespace LanguageStatement\LanguageExtension\SPL;


class SPL
{
    // 接口部分,异常 参见 PredefinedInterface

    // class info
    public static function spl_classes(){return spl_classes();}//返回所有可用的SPL类
    public static function spl_object_hash($obj){return spl_object_hash($obj);}//返回指定对象的hash id
    public static function class_uses($class,$autoload=true){return class_uses($class,$autoload);}//Return the traits used by the given class
    public static function class_parents($class,$autoload){return class_parents($class,$autoload);}//返回指定类的父类。
    public static function class_implements($class,$autoload){return class_implements($class,$autoload);}//返回指定的类实现的所有接口。
    // class load
    public static function spl_autoload($class_name,$file_extensions){spl_autoload($class_name,$file_extensions);}//__autoload()函数的默认实现
    public static function spl_autoload_functions(){return spl_autoload_functions();}//返回所有已注册的__autoload()函数。
    public static function spl_autoload_extensions(){return spl_autoload_extensions();}//注册并返回spl_autoload函数使用的默认文件扩展名。
    public static function spl_autoload_register($autoload_function,$throw=true,$prepend=false){return spl_autoload_register($autoload_function,$throw,$prepend);}//注册给定的函数作为 __autoload 的实现
    public static function spl_autoload_unregister($autoload_function){return spl_autoload_unregister($autoload_function);}//注销已注册的__autoload()函数
    public static function spl_autoload_call($class_name){spl_autoload_call($class_name);}//尝试调用所有已注册的__autoload()函数来装载请求类
    // iterator
    public static function iterator_apply($iterator,$function,$args){return iterator_apply($iterator,$function,$args);}//(foreach)为迭代器中每个元素调用一个用户自定义函数
    public static function iterator_to_array($iterator,$use_keys=true){return iterator_to_array($iterator,$use_keys);}//将迭代器中的元素拷贝到数组
    public static function iterator_count($iterator){return iterator_count($iterator);}//计算迭代器中元素的个数

}