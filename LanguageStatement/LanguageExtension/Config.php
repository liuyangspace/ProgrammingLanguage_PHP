<?php
/**
 * PHP 配置
 */

namespace LanguageStatement\LanguageExtension;


class Config
{
    // 系统环境变量参见 PHPInfo
    //配置可被设定范围
    public static $configAreas=[
        'PHP_INI_USER'  => '可在用户脚本（例如 ini_set()）或 Windows 注册表（自 PHP 5.3 起）以及 .user.ini 中设定',
        'PHP_INI_PERDIR'=> '可在 php.ini，.htaccess 或 httpd.conf 中设定',
        'PHP_INI_SYSTEM'=> '可在 php.ini 或 httpd.conf 中设定',
        'PHP_INI_ALL'   => '可在任何地方设定',
    ];

    // 配置 解析
    public static function parse_ini_file($filename,$process_sections=false,$scanner_mode=INI_SCANNER_NORMAL){return parse_ini_file($filename,$process_sections,$scanner_mode);}//解析一个配置文件
    public static function parse_ini_string($ini,$process_sections=false,$scanner_mode=INI_SCANNER_NORMAL){return parse_ini_file($ini,$process_sections,$scanner_mode);}//解析配置字符串
    //php配置
    public static function ini_get($name){ return ini_get($name); }//获取一个配置选项的值
    public static function ini_get_all($extension=null,$details=true){ return ini_get_all($extension,$details); }//获取所有已注册的配置选项
    public static function ini_set($name,$value){ return ini_set($name,$value); }//为一个配置选项设置值
    public static function ini_alter($name,$value){ ini_alter($name,$value); }//别名 ini_set()
    public static function ini_restore($name){ ini_restore($name); }//恢复指定的配置选项到它的原始值。
    public static function restore_include_path(){ restore_include_path();}//还原到 php.ini 中设置的 include_path 主值。
    public static function get_include_path(){return get_include_path();}//获取当前 include_path配置选项的值。
    public static function set_include_path($new_include_path){return set_include_path($new_include_path);}//为当前脚本设置 include_path运行时的配置选项。
    public static function get_magic_quotes_gpc(){return get_magic_quotes_gpc();}//获取当前 magic_quotes_gpc 的配置选项设置
    public static function get_magic_quotes_runtime(){return get_magic_quotes_runtime();}//获取当前 magic_quotes_runtime 配置选项的激活状态
    public static function set_magic_quotes_runtime($new_setting){return set_magic_quotes_runtime($new_setting);}//设置当前 magic_quotes_runtime 配置选项的激活状态
    public static function magic_quotes_runtime($new_setting){ magic_quotes_runtime($new_setting);}//别名 set_magic_quotes_runtime()
    public static function get_cfg_var($option){return get_cfg_var($option);}//获取 PHP 配置选项 option 的值。

    public static function php_ini_loaded_file(){return php_ini_loaded_file();}//检查是否有加载的 php.ini 文件，并取回它的路径。
    public static function php_ini_scanned_files(){return php_ini_scanned_files();}//返回从额外 ini 目录里解析的 .ini 文件列表,包括了 --with-config-file-scan-dir选项里声明的路径。
}