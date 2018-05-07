<?php
/**
 * FileInfo 文件信息 类型，编码，详情
 */

namespace LanguageStatement\LanguageExtension\Streams\File;


class finfo extends \finfo
{
    const FILEINFO_NONE             = FILEINFO_NONE;//无特殊处理。
    const FILEINFO_SYMLINK          = FILEINFO_SYMLINK;//跟随符号链接。
    const FILEINFO_MIME_TYPE        = FILEINFO_MIME_TYPE;//返回 mime 类型。 自 PHP 5.3.0 可用。
    const FILEINFO_MIME_ENCODING    = FILEINFO_MIME_ENCODING;//返回文件的 mime 编码。 自 PHP 5.3.0 可用。
    const FILEINFO_MIME             = FILEINFO_MIME;//按照 RFC 2045 定义的格式返回文件 mime 类型和编码。
    const FILEINFO_COMPRESS         = FILEINFO_COMPRESS;//解压缩压缩文件。 由于线程安全问题，自 PHP 5.3.0 禁用。
    const FILEINFO_DEVICES          = FILEINFO_DEVICES;//查看设备的块内容或字符。
    const FILEINFO_CONTINUE         = FILEINFO_CONTINUE;//返回全部匹配的类型。
    const FILEINFO_PRESERVE_ATIME   = FILEINFO_PRESERVE_ATIME;//如果可以的话，尽可能保持原始的访问时间。
    const FILEINFO_RAW              = FILEINFO_RAW;//对于不可打印字符不转换成 \ooo 八进制表示格式。

    //面向对象风格
    public function __construct($options=FILEINFO_NONE,$magic_file=NULL){parent::__construct($options,$magic_file);}//
    public function file($file_name=null,$options=FILEINFO_NONE,$context=null){return parent::file($file_name, $options, $context);}
    public function set_flags($options){return parent::set_flags($options);}//
    public function buffer($string=null,$options=FILEINFO_NONE,$context=null){return parent::buffer($string, $options, $context);}

    //过程化风格
    public static function finfo_open($options=FILEINFO_NONE,$magic_file=NULL){return finfo_open($options,$magic_file);}//创建一个 fileinfo 资源
    public static function finfo_file($finfo,$file_name=NULL,$options=FILEINFO_NONE,$context=NULL){return finfo_file($finfo,$file_name,$options,$context);}//返回一个文件的信息
    public static function finfo_set_flags($finfo,$options){return finfo_set_flags($finfo,$options);}//设置 libmagic 配置选项
    public static function finfo_buffer($finfo,$string=NULL,$options=FILEINFO_NONE,$context=NULL){return finfo_buffer($finfo,$string,$options,$context);}//返回一个字符串缓冲区的信息
    public static function finfo_close($finfo){return finfo_close($finfo);}//关闭 fileinfo 资源
    //string mime_content_type ( string $filename ) 检测文件的 MIME 类型（已废弃）
}