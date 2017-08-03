<?php
/**
 * PHP File
 */

namespace LanguageStatement\UtilComponent\Streams\File;


class File
{
    /* 面向对象文件操作方法 参见 SPL/File( SplFileInfo, SplFileObject, SplTempFileObject, DirectoryIterator) */
    protected static $config=[
        'allow_url_fopen',//激活了 URL 形式的 fopen 封装协议使得可以访问 URL 对象例如文件。
        'allow_url_include',//This option allows the use of URL-aware fopen wrappers with the following functions: include, include_once, require, require_once.
        'user_agent',//定义 PHP 发送的 User-Agent。
        'default_socket_timeout',//基于 socket 的流的默认超时时间（秒）。
        'auto_detect_line_endings',//当设为 On 时，PHP 将检查通过 fgets() 和 file()取得的数据中的行结束符号是符合 Unix，MS-DOS，还是 Macintosh 的习惯。
    ];

    protected static $constants=[
        'DIRECTORY_SEPARATOR'   => DIRECTORY_SEPARATOR,// /,\ 目录界别符
        'PATH_SEPARATOR'        => PATH_SEPARATOR,// ; path 变量界别符
    ];

    //文件操作
    public static function fnmatch($pattern,$string,$flags=0){return fnmatch($pattern,$string,$flags);}//用模式匹配文件名
    // path
    const PATHINFO_DIRNAME      = PATHINFO_DIRNAME;
    const PATHINFO_BASENAME     = PATHINFO_BASENAME;
    const PATHINFO_EXTENSION    = PATHINFO_EXTENSION;
    const PATHINFO_FILENAME     = PATHINFO_FILENAME;
    public static function pathinfo($path,$options){return pathinfo($path,$options);}//返回文件路径的信息
    public static function dirname($path){return dirname($path);}//返回路径中的目录部分
    public static function basename($path,$suffix){return basename($path,$suffix);}//返回路径中的文件名部分
    public static function realpath($path){return realpath($path);}//返回规范化的绝对路径名
    // 文件上传
    public static function is_uploaded_file($filename){return is_uploaded_file($filename);}//判断文件是否是通过 HTTP POST 上传的
    public static function move_uploaded_file($filename,$destination){return move_uploaded_file($filename,$destination);}//将上传的文件移动到新位置
    // 文件  类型 权限
    public static function file_exists($filename){return file_exists($filename);}//检查文件或目录是否存在
    public static function is_readable($filename){return is_readable($filename);}//判断给定文件名是否存在并且可读。
    public static function is_writable($filename){return is_writable($filename);}//判断给定的文件名是否可写
    public static function is_writeable($filename){return is_writeable($filename);}//is_writable() 的别名
    public static function is_executable($filename){return is_executable($filename);}//判断给定文件名是否可执行。
    public static function is_dir($filename){return is_dir($filename);}//判断给定文件名是否是一个目录
    public static function is_file($filename){return is_file($filename);}//判断给定文件名是否为一个正常的文件
    public static function is_link($filename){return is_link($filename);}//判断给定文件名是否为一个符号连接
    // 文件 操作
    const FILE_USE_INCLUDE_PATH     = FILE_USE_INCLUDE_PATH;//在 include_path 中查找文件。
    const FILE_IGNORE_NEW_LINES     = FILE_IGNORE_NEW_LINES;//在数组每个元素的末尾不要添加换行符
    const FILE_SKIP_EMPTY_LINES     = FILE_SKIP_EMPTY_LINES;//跳过空行
    public static function file($filename,$flags=0,$context){return file($filename,$flags,$context);}//把整个文件读入一个数组中
    public static function file_get_contents($filename,$use_include_path=false,$context,$offset=-1,$maxlen){return file_get_contents($filename,$use_include_path,$context,$offset,$maxlen);}//将整个文件读入一个字符串
    public static function file_put_contents($filename,$data,$context){return file_put_contents($filename,$data,$context);}//将一个字符串写入文件

    public static function tempnam($dirname,$prefix){return tempnam($dirname,$prefix);}//建立一个具有唯一文件名的文件
    public static function touch($filename,$time,$atime){return touch($filename,$time,$atime);}//创建修改文件
    public static function copy($filename,$dest,$context){return copy($filename,$dest,$context);}//拷贝文件
    public static function unlink($filename,$context){return unlink($filename,$context);}//删除文件
    public static function rename($oldname,$newname,$context){return rename($oldname,$newname,$context);}//重命名一个文件或目录

    public static function mkdir($dirname,$mode=0777,$recursive=false,$context){return mkdir($dirname,$mode,$recursive,$context);}//尝试新建一个由 pathname 指定的目录。
    public static function rmdir($dirname,$context){return rmdir($dirname,$context);}//删除目录
    // 符号链接
    public static function link($target,$link){return link($target,$link);}//建立一个硬连接。
    public static function symlink($target,$link){return symlink($target,$link);}//仅针对 Windows,建立符号连接
    public static function linkinfo($path){return linkinfo($path);}//获取一个连接的信息
    public static function lchgrp($filename,$group){return lchgrp($filename,$group);}//修改符号链接的所有组
    public static function lchown($filename,$user){return lchown($filename,$user);}//修改符号链接的所有者
    public static function readlink($filename){return readlink($filename);}//返回符号连接的内容。
    // 文件 信息 状态 系统 权限
    public static function umask($mask){return umask($mask);}//改变当前的 umask(0777)
    public static function chgrp($filename,$group){return chgrp($filename,$group);}//改变文件所属的组
    public static function chown($filename,$user){return chown($filename,$user);}//改变文件的所有者
    public static function chmod($filename,$mode){return chmod($filename,$mode);}//改变文件模式
    public static function fileinode($filename){return fileinode($filename);}//取得文件的 inode
    public static function fileatime($filename){return fileatime($filename);}//取得文件的上次访问时间
    public static function filectime($filename){return filectime($filename);}//取得文件的 inode 修改时间,权限，所有者，所有组或其它 inode 中的元数据被更新时。
    public static function filemtime($filename){return filemtime($filename);}//取得文件修改时间
    public static function fileowner($filename){return fileowner($filename);}//取得文件的所有者
    public static function filegroup($filename){return filegroup($filename);}//取得文件的组
    public static function fileperms($filename){return fileperms($filename);}//取得文件的权限
    public static function filesize($filename){return filesize($filename);}//取得文件大小
    public static function filetype($filename){return filetype($filename);}//取得文件类型（char，dir，block，link...）

    public static function stat($filename){return stat($filename);}//给出文件的信息
    public static function lstat($filename){return lstat($filename);}//给出一个文件或符号连接的信息
    // 磁盘 信息
    public static function disk_free_space($directory){return disk_free_space($directory);}//返回目录中的可用空间
    public static function diskfreespace($directory){return diskfreespace($directory);}//disk_free_space() 的别名
    public static function disk_total_space($directory){return disk_total_space($directory);}//返回一个目录的磁盘总大小
    // 文件 指针
    const SEEK_SET      = SEEK_SET;//设定位置等于 offset 字节。
    const SEEK_CUR      = SEEK_CUR;//设定位置为当前位置加上 offset。
    const SEEK_END      = SEEK_END;//设定位置为文件尾加上 offset。
    public static function tmpfile(){}//建立一个临时文件
    public static function fopen($filename,$mode,$use_include_path=false,$context){return fopen($filename,$mode,$use_include_path,$context);}//打开文件或者 URL
    public static function rewind($handle){return rewind($handle);}//倒回文件指针的位置
    public static function fseek($handle,$offset,$whence=SEEK_SET){return fseek($handle,$offset,$whence);}//在文件指针中定位
    public static function ftell($handle){return ftell($handle);}//返回文件指针读/写的位置
    public static function feof($handle){return feof($handle);}//测试文件指针是否到了文件结束的位置
    public static function fpassthru($handle){return fpassthru($handle);}//输出文件指针处的所有剩余数据
    public static function fgetc($handle){return fgetc($handle);}//从文件句柄中获取一个字符。
    public static function fgets($handle,$length){return fgets($handle,$length);}//从文件指针中读取一行
    public static function fgetss($handle,$length,$allowable_tags){return fgetss($handle,$length,$allowable_tags);}//从文件指针中读取一行并过滤掉 HTML 标记
    public static function fgetcsv($handle,$length=0,$delimiter=',',$enclosure='"',$escape='\\'){return fgetcsv($handle,$length,$delimiter,$enclosure,$escape);}//从文件指针中读入一行并解析 CSV 字段
    public static function fscanf($handle,$format){return fscanf($handle,$format);}//从文件中格式化输入
    public static function fread($handle,$length){return fread($handle,$length);}//读取文件（可安全用于二进制文件）
    public static function fwrite($handle,$string,$length){return fwrite($handle,$string,$length);}//写入文件（可安全用于二进制文件）
    public static function fputs($handle,$string,$length){return fputs($handle,$string,$length);}//fwrite() 的别名
    public static function fputcsv($handle,$fields,$delimiter=',',$enclosure='"'){return fputcsv($handle,$fields,$delimiter,$enclosure);}//将行格式化为 CSV 并写入文件指针
    public static function fflush($handle){return fflush($handle);}//将缓冲内容输出到文件
    public static function fclose($handle){return fclose($handle);}//关闭一个已打开的文件指针
    const LOCK_SH       = LOCK_SH;//共享锁定（读取的程序）。
    const LOCK_EX       = LOCK_EX;//独占锁定（写入的程序）。
    const LOCK_UN       = LOCK_UN;//释放锁定（无论共享或独占）。
    const LOCK_NB       = LOCK_NB;//释放锁定（无论共享或独占）。
    public static function flock($handle,$operation,&$wouldblock){return flock($handle,$operation,$wouldblock);}//轻便的咨询文件锁定
    public static function fstat($handle){return fstat($handle);}//通过已打开的文件指针取得文件信息
    public static function ftruncate($handle,$size){return ftruncate($handle,$size);}//将文件截断到给定的长度
    const GLOB_MARK     = GLOB_MARK;//在每个返回的项目中加一个斜线
    const GLOB_NOSORT   = GLOB_NOSORT;//按照文件在目录中出现的原始顺序返回（不排序）
    const GLOB_NOCHECK  = GLOB_NOCHECK;//如果没有文件匹配则返回用于搜索的模式
    const GLOB_NOESCAPE = GLOB_NOESCAPE;//反斜线不转义元字符
    const GLOB_BRACE    = GLOB_BRACE;//扩充 {a,b,c} 来匹配 'a'，'b' 或 'c'
    const GLOB_ONLYDIR  = GLOB_ONLYDIR;//仅返回与模式匹配的目录项
    const GLOB_ERR      = GLOB_ERR;//停止并读取错误信息（比如说不可读的目录），默认的情况下忽略所有错误
    public static function glob($handle,$flags=0){return glob($handle,$flags);}//寻找与模式匹配的文件路径
    // 管道
    public static function popen($command,$mode){return popen($command,$mode);}//打开一个指向进程的管道
    public static function pclose($handle){return pclose($handle);}//关闭进程文件管道
    //void delete ( void )
    // 文件 输出
    public static function readfile($filename,$use_include_path=false,$context){return readfile($filename,$use_include_path,$context);}//读取文件并写入到输出缓冲。
    //
    public static function realpath_cache_get(){return realpath_cache_get();}//获取真实目录缓存的详情
    public static function realpath_cache_size(){return realpath_cache_size();}//获取真实路径缓存区大小在内存中的使用量。
    public static function clearstatcache($clear_realpath_cache=false,$filename){clearstatcache($clear_realpath_cache,$filename);}//清除文件状态缓存

    //文件上传 （基于$__FILES 和 非基于$__FILES）
}

