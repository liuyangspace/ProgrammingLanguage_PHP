<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/31
 * Time: 17:48
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class PHPInfo
{

    //php 环境变量
    public static function phpinfo($what=INFO_ALL){return phpinfo($what);}//输出关于 PHP 配置的信息
    public static function phpversion($extension){return phpversion($extension);}//返回了包含当前运行 PHP 解释器或扩展版本信息的 string。
    public static function zend_version(){return zend_version();}//获取当前运行的 Zend 引擎的版本字符串。
    public static function getenv($varname){return getenv($varname);}//获取一个环境变量的值
    public static function putenv($setting){return putenv($setting);}//添加 setting 到服务器环境变量。 环境变量仅存活于当前请求期间。 在请求结束时环境会恢复到初始状态。
    public static function php_sapi_name(){return php_sapi_name();}//返回 web 服务器和 PHP 之间的接口类型
    public static function phpcredits($flag=CREDITS_ALL){return phpcredits($flag);}//打印 PHP 贡献者名单
    public static function sys_get_temp_dir(){return sys_get_temp_dir();}//返回 PHP 储存临时文件的默认目录的路径。
    public static function version_compare($version1,$version2,$operator){return version_compare($version1,$version2,$operator);}//对比两个「PHP 规范化」的版本数字字符串。 这对于编写仅能兼容某些版本 PHP 的程序很有帮助。

    //系统信息
    public static function php_uname($mode="a"){ return php_uname($mode); }//返回运行 PHP 的系统的有关信息
    public static function sys_getloadavg(){ return sys_getloadavg(); }//获取系统的负载（load average）
    public static function getrusage($who=0){ return getrusage($who); }//获取当前系统资源使用状况
    public static function get_current_user(){return get_current_user();}//获取当前 PHP 脚本所有者名称
    public static function getmyuid(){return getmyuid();}//获取 PHP 脚本所有者的 UID
    public static function getmygid(){return getmygid();}//获取当前 PHP 脚本拥有者的用户组 ID。
    public static function getmypid(){return getmypid();}//获取 PHP 进程的 ID
    public static function getmyinode(){return getmyinode();}//获取当前脚本的索引节点（inode）。
    public static function php_logo_guid(){return php_logo_guid();}//获取 logo 的 guid
    public static function zend_logo_guid(){return zend_logo_guid();}//获取 Zend guid
    public static function zend_thread_id(){return zend_thread_id();}//该函数返回当前线程的唯一识别符。
    // memory
    public static function memory_get_usage($real_usage=false){return memory_get_usage($real_usage);}//回当前分配给你的 PHP 脚本的内存量，单位是字节（byte）。
    public static function memory_get_peak_usage($real_usage=false){return memory_get_peak_usage($real_usage);}//返回分配给你的 PHP 脚本的内存峰值字节数。

}