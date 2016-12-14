<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/14
 * Time: 14:41
 */

namespace LanguageStatement;


class LanguageRegulate
{

    //错误

    //内存

    // PHP Manual›输出控制›Output Control 函数
    public static function flush(){ flush(); }//刷新输出缓冲
    public static function ob_start(){ return ob_start(); }//返回输出缓冲区的内容
    public static function ob_get_contents(){ return ob_get_contents(); }//返回输出缓冲区的内容
    public static function ob_get_flush(){ return ob_get_contents(); }//刷出（送出）缓冲区内容，以字符串形式返回内容，并关闭输出缓冲区。
    public static function ob_end_clean(){ return ob_end_clean(); }//返回输出缓冲区的内容
    public static function ob_end_flush(){ return ob_end_clean(); }//冲刷出（送出）输出缓冲区内容并关闭缓冲
    public static function ob_list_handlers(){ return ob_list_handlers(); }//列出所有使用中的输出处理程序。
    public static function ob_flush(){ ob_flush(); }//冲刷出（送出）输出缓冲区中的内容
    public static function ob_gzhandler($buffer,$mode){ ob_gzhandler($buffer,$mode); }//在ob_start中使用的用来压缩输出缓冲区中内容的回调函数。ob_start callback function to gzip output buffer
    public static function ob_implicit_flush($flag=true){ ob_implicit_flush($flag); }//冲刷出（送出）输出缓冲区中的内容
    public static function ob_iconv_handler($contents,$status){ ob_iconv_handler($contents,$status); }//以输出缓冲处理程序转换字符编码
}