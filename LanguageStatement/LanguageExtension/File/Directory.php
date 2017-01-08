<?php
/**
 * 目录相关操作
 */

namespace LanguageStatement\LanguageExtension\File;


class Directory extends \Directory
{
    protected static $constants=[
        'DIRECTORY_SEPARATOR'   => DIRECTORY_SEPARATOR,// /,\ 目录界别符
        'PATH_SEPARATOR'        => PATH_SEPARATOR,// ; path 变量界别符
    ];

    //面向过程函数
    public static function opendir($path,$context){return opendir($path,$context);}//打开目录句柄
    public static function readdir($dir_handle){return readdir($dir_handle);}//返回目录中下一个文件的文件名。
    public static function rewinddir($dir_handle){rewinddir($dir_handle);}//将 dir_handle 指定的目录流重置到目录的开头。
    public static function closedir($dir_handle){closedir($dir_handle);}//关闭目录句柄
    //面向对象方法
    public static function dir($directory,$context){return dir($directory,$context);}//返回一个 Directory 类实例
    public function read($dir_handle){parent::read($dir_handle);}//从目录句柄中读取条目
    public function rewind($dir_handle){parent::rewind($dir_handle);}//倒回目录句柄
    public function close($dir_handle){parent::close($dir_handle);}//释放目录句柄
    //扫描
    public static function scandir($directory,$sorting_order,$context){return scandir($directory,$sorting_order,$context);}//列出指定路径中的文件和目录
    //cli （命令行特有）
    public static function getcwd(){return getcwd();}//取得PHP工作目录
    public static function chdir($directory){return chdir($directory);}//将PHP工作目录改为 directory。
    public static function chroot($directory){return chroot($directory);}//改变根目录

}