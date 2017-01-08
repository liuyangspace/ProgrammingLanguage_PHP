<?php
/**
 * PHP File
 */

namespace LanguageStatement\UtilComponent\Streams\File;


class File
{
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

    //文件上传 （基于$__FILES 和 非基于$__FILES）
}

