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

    /**
     * POSIX
     */
    // 文件权限
    const POSIX_F_OK        = POSIX_F_OK;//whether the file exists
    const POSIX_R_OK        = POSIX_R_OK;//whether the file has read
    const POSIX_W_OK        = POSIX_W_OK;//whether the file has write
    const POSIX_X_OK        = POSIX_X_OK;//whether the file has execute
    public static function posix_access($file,$mode=POSIX_F_OK){return posix_access($file,$mode);}//检测文件的可读写权限
    public static function posix_isatty($fd){return posix_isatty($fd);}//Determine if a file descriptor is an interactive terminal
    // 终端信息
    public static function posix_ctermid(){return posix_ctermid();}//Get path name of controlling terminal
    public static function posix_getcwd(){return posix_getcwd();}//Pathname of current directory
    public static function posix_ttyname($fd){return posix_ttyname($fd);}//Determine terminal device name
    // 系统信息
    public static function posix_getlogin(){return posix_getlogin();}//Return login name
    public static function posix_uname(){return posix_uname();}//Get system name
    public static function posix_getrlimit(){return posix_getrlimit();}//Return info about system resource limits
    public static function posix_setrlimit($resource,$softlimit,$hardlimit){return posix_setrlimit($resource,$softlimit,$hardlimit);}//Set system resource limits
    // 进程 信息
    public static function posix_getpid(){return posix_getpid();}//返回当前进程 id
    public static function posix_getppid(){return posix_getppid();}//Return the parent process identifier
    public static function posix_getsid($pid){return posix_getsid($pid);}//Get the current sid of the process
    public static function posix_setsid(){return posix_setsid();}//Make the current process a session leader
    public static function posix_kill($pid,$sig){return posix_kill($pid,$sig);}//Send a signal to a process
    public static function posix_times(){return posix_times();}//Get process times
    //
    public static function posix_mkfifo($pathname,$mode){return posix_mkfifo($pathname,$mode);}//Create a fifo special file (a named pipe)
    public static function posix_mknod($pathname,$mode,$major=0,$minor=0){return posix_mknod($pathname,$mode,$major,$minor);}//Create a special or ordinary file (POSIX.1)
    // 用户 信息
    public static function posix_getuid(){return posix_getuid();}//Return the real user ID of the current process
    public static function posix_setuid($uid){return posix_setuid($uid);}//Set the UID of the current process
    public static function posix_geteuid(){return posix_geteuid();}//Return the effective user ID of the current process
    public static function posix_seteuid($uid){return posix_seteuid($uid);}//Set the effective UID of the current process
    public static function posix_getpwnam($username){return posix_getpwnam($username);}//Return info about a user by username
    public static function posix_getpwuid($uid){return posix_getpwuid($uid);}//Return info about a user by user id
    // 用户组 信息
    public static function posix_getgid(){return posix_getgid();}//Return the real group ID of the current process
    public static function posix_setgid($gid){return posix_setgid($gid);}//Set the GID of the current process
    public static function posix_getegid(){return posix_getegid();}//Return the effective group ID of the current process
    public static function posix_setegid($gid){return posix_setegid($gid);}//Set the effective GID of the current process
    public static function posix_getpgrp(){return posix_getpgrp();}//Return the current process group identifier
    public static function posix_getgroups(){return posix_getgroups();}//Return the group set of the current process
    public static function posix_getpgid($pid){return posix_getpgid($pid);}//Get process group id for job control
    public static function posix_setpgid($pid,$pgid){return posix_setpgid($pid,$pgid);}//Set process group id for job control
    public static function posix_getgrgid($gid){return posix_getgrgid($gid);}//Return info about a group by group id
    public static function posix_getgrnam($name){return posix_getgrnam($name);}//Return info about a group by name
    public static function posix_initgroups($name,$base_group_id){return posix_initgroups($name,$base_group_id);}//Calculate the group access list
    // 错误
    public static function posix_get_last_error(){return posix_get_last_error();}//获取最近一次posix函数的错误码
    public static function posix_errno(){return posix_errno();}//别名 posix_get_last_error()
    public static function posix_strerror($errno){return posix_strerror($errno);}//Retrieve the system error message associated with the given errno

}