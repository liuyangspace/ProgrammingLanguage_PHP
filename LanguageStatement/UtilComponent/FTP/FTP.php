<?php
/**
 * PHP FTP
 * 本扩展中的函数实现了通过 FTP 协议访问文件服务器的客户端。 FTP 协议在 » http://www.faqs.org/rfcs/rfc959 中定义。
 * 本扩展提供了对于 FTP 服务器完整的访问及控制功能。 如果只是简单的从 FTP 服务器读取或向服务器写入一个文件， 请考虑
 * 使用 ftp:// 包装器 和 文件系统函数， 会更加的简单。
 */

namespace LanguageStatement\UtilComponent\FTP;


class FTP
{
    protected static $config=[
        'from',//定义匿名 ftp 的密码（email 地址）。
    ];

    // 连接 建立
    public static function ftp_connect($host,$port=21,$timeout=90){return ftp_connect($host,$port,$timeout);}//建立一个新的 FTP 连接
    public static function ftp_ssl_connect($host,$port=21,$timeout=90){return ftp_ssl_connect($host,$port,$timeout);}//打开 SSL-FTP 连接,要在 PHP 中使用 sFTP，请参见 ssh2_sftp()(SSH)

    // 登录
    public static function ftp_login($ftp_stream,$username,$password){return ftp_login($ftp_stream,$username,$password);}//使用用户名和密码登录入给定的 FTP 连接。

    // option
    public static function ftp_set_option($ftp_stream,$option,$value){return ftp_set_option($ftp_stream,$option,$value);}//设置各种 FTP 运行时选项
    public static function ftp_get_option($ftp_stream,$option){return ftp_get_option($ftp_stream,$option);}//返回当前 FTP 连接的各种不同的选项设置
    public static function ftp_pasv($ftp_stream,$pasv){return ftp_pasv($ftp_stream,$pasv);}//返回当前 FTP 被动模式是否打开
    public static function ftp_systype($ftp_stream){return ftp_systype($ftp_stream);}//返回远程 FTP 服务器的操作系统类型
    //
    public static function ftp_exec($ftp_stream,$command){return ftp_exec($ftp_stream,$command);}//请求运行一条 FTP 命令
    public static function ftp_raw($ftp_stream,$command){return ftp_raw($ftp_stream,$command);}//向 FTP 服务器发送命令
    public static function ftp_site($ftp_stream,$command){return ftp_site($ftp_stream,$command);}//向服务器发送 SITE 命令

    // dir
    public static function ftp_pwd($ftp_stream){return ftp_pwd($ftp_stream);}//返回当前目录名
    public static function ftp_chdir($ftp_stream,$directory){return ftp_chdir($ftp_stream,$directory);}//在 FTP 服务器上改变当前目录
    public static function ftp_nlist($ftp_stream,$directory){return ftp_nlist($ftp_stream,$directory);}//返回给定目录的文件列表
    public static function ftp_rawlist($ftp_stream,$directory){return ftp_rawlist($ftp_stream,$directory);}//返回指定目录下文件的详细列表
    public static function ftp_mkdir($ftp_stream,$directory){return ftp_mkdir($ftp_stream,$directory);}//建立新目录
    public static function ftp_rmdir($ftp_stream,$directory){return ftp_rmdir($ftp_stream,$directory);}//删除 FTP 服务器上的一个目录

    public static function ftp_rename($ftp_stream,$oldname,$newname){return ftp_rename($ftp_stream,$oldname,$newname);}//更改 FTP 服务器上的文件或目录名
    // 文件
    public static function ftp_chmod($ftp_stream,$mode,$filename){return ftp_chmod($ftp_stream,$mode,$filename);}//设置 FTP 服务器上的文件权限
    public static function ftp_delete($ftp_stream,$path){return ftp_delete($ftp_stream,$path);}//删除 FTP 服务器上的一个文件
    public static function ftp_mdtm($ftp_stream,$remote_file){return ftp_mdtm($ftp_stream,$remote_file);}//返回指定文件的最后修改时间
    public static function ftp_size($ftp_stream,$remote_file){return ftp_size($ftp_stream,$remote_file);}//返回指定文件的大小

    public static function ftp_get($ftp_stream,$local_file,$remote_file,$mode,$resumepos=0){return ftp_get($ftp_stream,$local_file,$remote_file,$mode,$resumepos);}//从 FTP 服务器上下载一个文件
    public static function ftp_put($ftp_stream,$remote_file,$local_file,$mode,$startpos=null){return ftp_put($ftp_stream,$remote_file,$local_file,$mode,$startpos);}//上传文件到 FTP 服务器

    public static function ftp_alloc($ftp_stream,$filesize,&$result=null){return ftp_alloc($ftp_stream,$filesize,$result);}//为要上传的文件分配空间
    public static function ftp_fput($ftp_stream,$remote_file,$handle,$mode,$startpos=0){return ftp_fput($ftp_stream,$remote_file,$handle,$mode,$startpos);}//上传一个已经打开的文件到 FTP 服务器
    public static function ftp_fget($ftp_stream,$handle,$remote_file,$mode,$resumepos=0){return ftp_fget($ftp_stream,$handle,$remote_file,$mode,$resumepos);}//从 FTP 服务器上下载一个文件并保存到本地一个已经打开的文件中

    // 非阻塞
    public static function ftp_nb_continue($ftp_stream){return ftp_nb_continue($ftp_stream);}//连续获取／发送文件（non-blocking）
    public static function ftp_nb_fget($ftp_stream,$handle,$remote_file,$mode,$resumepos=0){return ftp_nb_fget($ftp_stream,$handle,$remote_file,$mode,$resumepos);}//从 FTP 服务器获取文件并写入到一个打开的文件（非阻塞）
    public static function ftp_nb_fput($ftp_stream,$remote_file,$handle,$mode,$startpos=0){return ftp_nb_fput($ftp_stream,$remote_file,$handle,$mode,$startpos);}//将文件存储到 FTP 服务器 （非阻塞）
    public static function ftp_nb_get($ftp_stream,$local_file,$remote_file,$mode,$resumepos=null){return ftp_nb_get($ftp_stream,$local_file,$remote_file,$mode,$resumepos);}//从 FTP 服务器上获取文件并写入本地文件（non-blocking）
    public static function ftp_nb_put($ftp_stream,$remote_file,$local_file,$mode,$startpos=null){return ftp_nb_put($ftp_stream,$remote_file,$local_file,$mode,$startpos);}//存储一个文件至 FTP 服务器（non-blocking）

    // 连接 关闭
    public static function ftp_close($ftp_stream){return ftp_close($ftp_stream);}//关闭一个 FTP 连接
    public static function ftp_quit($ftp_stream){return ftp_quit($ftp_stream);}//关闭一个 FTP 连接

}