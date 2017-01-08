<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/16
 * Time: 14:49
 */

namespace LanguageStatement\UtilComponent\File;


class File
{
    protected static $config=[
        'allow_url_fopen',//激活了 URL 形式的 fopen 封装协议使得可以访问 URL 对象例如文件。
        'allow_url_include',//This option allows the use of URL-aware fopen wrappers with the following functions: include, include_once, require, require_once.
        'user_agent',//定义 PHP 发送的 User-Agent。
        'default_socket_timeout',//基于 socket 的流的默认超时时间（秒）。
    ];
    protected static $constants=[
        'DIRECTORY_SEPARATOR'   => DIRECTORY_SEPARATOR,// /,\ 目录界别符
        'PATH_SEPARATOR'        => PATH_SEPARATOR,// ; path 变量界别符
    ];

    //文件操作

    //文件上传 （基于$__FILES 和 非基于$__FILES）
}

