<?php
/**
 * 内存 垃圾回收
 */

namespace LanguageStatement\LanguageExtension;


class Memory
{
    public static $configs=[
        'memory_limit',//This sets the maximum amount of memory in bytes that a script is allowed to allocate
    ];

    //内存 垃圾回收
    public static function memory_get_usage($real_usage=false){return memory_get_usage($real_usage);}//回当前分配给你的 PHP 脚本的内存量，单位是字节（byte）。
    public static function memory_get_peak_usage($real_usage=false){return memory_get_peak_usage($real_usage);}//返回分配给你的 PHP 脚本的内存峰值字节数。

    public static function gc_collect_cycles(){return gc_collect_cycles();}//强制收集所有现存的垃圾循环周期。
    public static function gc_disable(){gc_disable();}//停用循环引用收集器，设置 zend.enable_gc 为 0。
    public static function gc_enable(){gc_enable();}//设置 zend.enable_gc 为 1， 激活循环引用收集器。
    public static function gc_enabled(){return gc_enabled();}//返回循环引用计数器的状态。
    public static function gc_mem_caches(){return gc_mem_caches();}//Reclaims memory used by the Zend Engine memory manager.
}