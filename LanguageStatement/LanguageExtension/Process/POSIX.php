<?php
namespace LanguageStatement\LanguageExtension\Process;

/**
 * POSIX
 * 表示可移植操作系统接口（Portable Operating System Interface of UNIX，缩写为 POSIX ）
 */
class POSIX
{
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