<?php
namespace LanguageStatement\LanguageExtension\Process;

/**
 * PCNIL (官方手册不建议被应用在Web服务器环境，非Unix类系统不支持此模块)
 */
class PCNIL
{
    public static function pcntl_exec($path,$args,$envs){pcntl_exec($path,$args,$envs);}//在当前进程空间执行指定程序
    public static function pcntl_alarm($seconds){return pcntl_alarm($seconds);}//为进程设置一个alarm闹钟信号
    public static function pcntl_fork(){return pcntl_fork();}//在当前进程当前位置产生分支（子进程）。
    //优先级
    public static function pcntl_getpriority($pid,$process_identifier=PRIO_PROCESS){return pcntl_getpriority($pid,$process_identifier);}//获取任意进程的优先级
    public static function pcntl_setpriority($priority,$pid,$process_identifier=PRIO_PROCESS){return pcntl_setpriority($priority,$pid,$process_identifier);}//修改任意进程的优先级
    // 信号量
    public static function pcntl_signal($signo,$handler,$restart_syscalls=true){return pcntl_signal($signo,$handler,$restart_syscalls);}//安装一个信号处理器
    public static function pcntl_signal_dispatch(){return pcntl_signal_dispatch();}//调用等待信号的处理器
    const SIG_BLOCK         = SIG_BLOCK;//把信号加入到当前阻塞信号中。
    const SIG_UNBLOCK       = SIG_UNBLOCK;//从当前阻塞信号中移出信号。
    const SIG_SETMASK       = SIG_SETMASK;//用给定的信号列表替换当前阻塞信号列表。
    public static function pcntl_sigprocmask($how,$set,&$oldset){return pcntl_sigprocmask($how,$set,$oldset);}//设置或检索阻塞信号
    public static function pcntl_sigwaitinfo($set,&$siginfo){return pcntl_sigwaitinfo($set,$siginfo);}//等待信号
    public static function pcntl_sigtimedwait($set,&$siginfo,$seconds=0,$nanoseconds=0){return pcntl_sigtimedwait($set,$siginfo,$seconds,$nanoseconds);}//带超时机制的信号等待
    // wait 子进程
    public static function pcntl_wait(&$status,$options=0){return pcntl_wait($status,$options);}//等待或返回fork的子进程状态
    public static function pcntl_waitpid($pid,&$status,$options=0){return pcntl_waitpid($pid,$status,$options);}//挂起当前进程的执行直到参数pid指定的进程号的进程退出， 或接收到一个信号要求中断当前进程或调用一个信号处理函数。
    public static function pcntl_wexitstatus($status){return pcntl_wexitstatus($status);}//返回一个中断的子进程的返回代码
    public static function pcntl_wifexited($status){return pcntl_wifexited($status);}//检查状态代码是否代表一个正常的退出。
    public static function pcntl_wifsignaled($status){return pcntl_wifsignaled($status);}//检查子进程状态码是否代表由于某个信号而中断
    public static function pcntl_wifstopped($status){return pcntl_wifstopped($status);}//检查子进程当前是否已经停止
    public static function pcntl_wstopsig($status){return pcntl_wstopsig($status);}//返回导致子进程停止的信号
    public static function pcntl_wtermsig($status){return pcntl_wtermsig($status);}//返回导致子进程中断的信号
    // error
    public static function pcntl_strerror($errno){return pcntl_strerror($errno);}//从系统错误号获取系统错误信息
    public static function pcntl_errno($errno){return pcntl_errno($errno);}//别名 pcntl_strerror()
    public static function pcntl_get_last_error(){return pcntl_get_last_error();}//Retrieve the error number set by the last pcntl function which failed

}