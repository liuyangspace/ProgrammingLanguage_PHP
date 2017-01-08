<?php
/**
 * PHP 网络相关
 */

namespace LanguageStatement\LanguageExtension\Network;


class Network
{
    protected static $config=[
        'user_agent',//定义 PHP 发送的 User-Agent。
        'default_socket_timeout',//基于 socket 的流的默认超时时间（秒）。
        'from',//定义匿名 ftp 的密码（email 地址）。
    ];
}