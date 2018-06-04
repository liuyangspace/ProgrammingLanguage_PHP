<?php
/**
 * PHP 进程控制
 */

namespace LanguageStatement\LanguageExtension;


class Process
{

    //PHP 多线程 参见 pthreads 扩展
    //PHP 文件权限 参见 Streams/File
    public static $Operators=[
        '``',//反引号，PHP 将尝试将反引号中的内容作为 shell 命令来执行，并将其输出信息返回（即，可以赋给一个变量而不是简单地丢弃到标准输出）。
    ];
    public static $configs=[
        'max_execution_time',//这设置了脚本被解析器中止之前允许的最大执行时间，单位秒。默认设置为 30。
    ];

    //PHP
    public static function eval($str=null){ return eval($str); }//把字符串作为PHP代码执行
    //shell 命令
    public static function escapeshellarg($arg){return escapeshellarg($arg);}//把字符串转码为可以在 shell 命令里使用的参数
    public static function escapeshellcmd($command){return escapeshellcmd($command);}//shell 元字符转义
    public static function exec($command,&$output,&$return_var){return exec($command,$output,$return_var);}//执行一个外部程序
    public static function passthru($command,&$return_var){passthru($command,$return_var);}//执行外部程序并且显示原始输出
    public static function system($command,&$return_var){return system($command,&$return_var);}//执行外部程序，并且显示输出
    public static function shell_exec($cmd){return shell_exec($cmd);}//通过 shell 环境执行命令，并且将完整的输出以字符串的方式返回。
    public static function proc_open($cmd,$descriptorspec,&$pipes,$cwd,$env,$other_options){return proc_open($cmd,$descriptorspec,&$pipes,$cwd,$env,$other_options);}//执行一个命令，并且打开用来输入/输出的文件指针。
    public static function proc_get_status($process){return proc_get_status($process);}//获取由 proc_open() 函数打开的进程的信息
    public static function proc_nice($increment){return proc_nice($increment);}//修改当前进程的优先级
    public static function proc_close($process){return proc_close($process);}//关闭由 proc_open() 打开的进程并且返回进程退出码
    public static function proc_terminate($process,$signal=15){return proc_terminate($process,$signal=15);}//杀除由 proc_open 打开的进程
    // 脚本文件 时间
    public static function set_time_limit($seconds){ set_time_limit($seconds); }//设置脚本最大执行时间
    public static function getlastmod(){return getlastmod();}//获取执行的主脚本的最后修改时间。
    // 延迟
    public static function sleep($seconds){ return sleep($seconds); }//延迟:秒数。
    public static function usleep($seconds){ usleep($seconds); }//延迟:微秒。
    public static function time_nanosleep($seconds,$nanoseconds){ return time_nanosleep($seconds,$nanoseconds); }//延迟:纳秒。
    public static function time_sleep_until($timestamp){ return time_sleep_until($timestamp); }//使脚本睡眠到指定的时间为止。
    // 中断
    public static function exit($str=null){ return exit($str); }//输出一个消息并且退出当前脚本
    public static function die($str=null){ return die($str); }//输出一个消息并且退出当前脚本
    // public static public static function __halt_compiler(){ return __halt_compiler(); }//中断编译器的执行

}