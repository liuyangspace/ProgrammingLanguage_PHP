<?php
/**
 * 浏览器 模型
 */

namespace LanguageStatement\LanguageExtension\Terminal;

class Browser
{
    protected $config=[
        'ignore_user_abort',//如果设置为 TRUE ，在客户端断开连接后，脚本不会被中止。
        'browscap',//浏览器功能文件的位置和文件名 (例如 browscap.ini)。
        //语法高亮的颜色。可设置为 <font color="??????"> 中任何可接受的代码。
        'highlight.bg',//
        'highlight.comment',//
        'highlight.default',//
        'highlight.html',//
        'highlight.keyword',//
        'highlight.string',//
    ];

    //客户端 浏览器
    public static function connection_aborted(){ return connection_aborted(); }//检查客户端是否已经断开
    public static function connection_status(){ return connection_status(); }//获得当前连接的状态位。
    public static function ignore_user_abort(){ return ignore_user_abort(); }//设置客户端断开连接时是否中断脚本的执行
    public static function get_browser($user_agent,$return_array=false){ return get_browser($user_agent,$return_array); }//通过查找 browscap.ini 文件中的浏览器信息，尝试检测用户的浏览器所具有的功能。
}