<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3
 * Time: 15:55
 */

namespace LanguageStatement\LanguageExtension;


class OPcache
{
    public static $configs=[
        'opcache.enable',//启用操作码缓存。
        'opcache.enable_cli',//仅针对 CLI 版本的 PHP 启用操作码缓存。 通常被用来测试和调试。
        'opcache.memory_consumption',//OPcache 的共享内存大小，以兆字节为单位。
        'opcache.interned_strings_buffer',//用来存储临时字符串的内存大小，以兆字节为单位。
        'opcache.max_wasted_percentage',//浪费内存的上限，以百分比计。
        'opcache.max_accelerated_files',//OPcache 哈希表中可存储的脚本文件数量上限。
        'opcache.use_cwd',//如果启用，OPcache 将在哈希表的脚本键之后附加改脚本的工作目录， 以避免同名脚本冲突的问题。
        'opcache.revalidate_freq',//检查脚本时间戳是否有更新的周期，以秒为单位。
        'opcache.validate_timestamps',//如果启用，那么 OPcache 会每隔 opcache.revalidate_freq 设定的秒数 检查脚本是否更新。
        'opcache.revalidate_path',//如果禁用此选项，在同一个 include_path已存在的缓存文件会被重用。
        'opcache.save_comments',//如果禁用，脚本文件中的注释内容将不会被包含到操作码缓存文件， 这样可以有效减小优化后的文件体积。
        'opcache.load_comments',//如果禁用，则即使文件中包含注释，也不会加载这些注释内容。
        'opcache.fast_shutdown',//如果启用，则会使用快速停止续发事件。
        'opcache.enable_file_override',//如果启用，则在调用函数 file_exists()， is_file() 以及 is_readable() 的时候， 都会检查操作码缓存，无论文件是否已经被缓存。
        'opcache.optimization_level',//控制优化级别的二进制位掩码。
        'opcache.dups_fix',//仅作为针对 "不可重定义类"错误的一种解决方案。
        'opcache.blacklist_filename',//不进行预编译优化的文件名，每行一个文件名。
        'opcache.max_file_size',//以字节为单位的缓存的文件大小上限。设置为 0表示缓存全部文件。
        'opcache.consistency_checks',//如果是非 0 值，OPcache 将会每隔 N 次请求检查缓存校验和。此选项对于性能有较大影响，请尽在调试环境使用。
        'opcache.force_restart_timeout',//如果缓存处于非激活状态，等待多少秒之后计划重启。
        'opcache.error_log',//OPcache 模块的错误日志文件。
        'opcache.log_verbosity_level',//OPcache 模块的日志级别。
        'opcache.preferred_memory_model',//OPcache 首选的内存模块。
        'opcache.protect_memory',//保护共享内存，以避免执行脚本时发生非预期的写入。 仅用于内部调试。
        'opcache.restrict_api',//仅允许路径是以指定字符串开始的 PHP 脚本调用 OPcache API 函数。 默认值为空字符串 ""，表示不做限制。
        //
        'opcache.mmap_base',//在 Windows 平台上共享内存段的基地址。
        'opcache.inherited_hack',//在 PHP 5.3 及后续版本中，此配置指令会被忽略。
    ];

    public static function opcache_compile_file($file){return opcache_compile_file($file);}//无需运行，即可编译并缓存 PHP 脚本
    public static function opcache_get_configuration(){return opcache_get_configuration();}//返回缓存实例的配置信息。
    public static function opcache_get_status($get_scripts=TRUE){return opcache_get_status($get_scripts);}//返回缓存实例的状态信息。
    public static function opcache_invalidate($script,$force=FALSE){return opcache_invalidate($script,$force);}//使得指定脚本的字节码缓存失效。
    public static function opcache_is_script_cached($file){return opcache_is_script_cached($file);}//checks if a PHP script has been cached in OPCache (PHP 5 >= 5.6.0, PHP 7, PECL ZendOpcache >= 7.0.4)
    public static function opcache_reset(){return opcache_reset();}//重置字节码缓存的内容
}