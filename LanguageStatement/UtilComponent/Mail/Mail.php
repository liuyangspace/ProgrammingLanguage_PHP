<?php
/**
 * Mail
 * PHP 首先会在你的 PATH 变量里查找 sendmail，
 * 然后在下面的路径里查找： /usr/bin:/usr/sbin:/usr/etc:/etc:/usr/ucblib:/usr/lib。
 */

namespace LanguageStatement\UtilComponent\Mail;


class Mail
{
    public static $config=[
        'mail.add_x_header',//Add X-PHP-Originating-Script that will include UID of the script followed by the filename.
        'mail.log',//The path to a log file that will log all mail() calls. Log entries include the full path of the script, line number, To address and headers.
        'SMTP',//仅用于 Windows：PHP 在 mail() 函数中用来发送邮件的 SMTP 服务器的主机名称或者 IP 地址。
        'smtp_port',//仅用于 Windows：SMTP 服务器的端口号，默认为 25。自 PHP 4.3.0 起可用。
        'sendmail_from',//在 Windows 下用 PHP 发送邮件时的"From:"邮件地址的值。该选项同时设置了 "Return-Path:"头。
        'sendmail_path',//sendmail 程序的路径，通常为 /usr/sbin/sendmail 或 /usr/lib/sendmail
    ];
}