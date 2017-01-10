<?php
/**
 * PHP URL
 */

namespace LanguageStatement\LanguageExtension\Streams\DataFormat;


class Url
{

    const PHP_URL_SCHEME            = PHP_URL_SCHEME;//协议
    const PHP_URL_HOST              = PHP_URL_HOST;//主机名、IP(V4、V6)
    const PHP_URL_PORT              = PHP_URL_PORT;//端口
    const PHP_URL_PATH              = PHP_URL_PATH;//
    const PHP_URL_QUERY             = PHP_URL_QUERY;//在问号 ? 之后
    const PHP_URL_FRAGMENT          = PHP_URL_FRAGMENT;//在散列符号 # 之后
    const PHP_URL_USER              = PHP_URL_USER;//
    const PHP_URL_PASS              = PHP_URL_PASS;//
    public static function parse_url($url,$component=-1){return parse_url($url,$component);}//解析 URL，返回其组成部分

    // url 编解码
    public static function urlencode($str){return urlencode($str);}//编码 URL 字符串
    public static function urldecode($str){return urldecode($str);}//解码已编码的 URL 字符串
    const PHP_QUERY_RFC1738         = PHP_QUERY_RFC1738;//
    const PHP_QUERY_RFC3986         = PHP_QUERY_RFC3986;//
    public static function http_build_query($query_data,$numeric_prefix,$arg_separator,$enc_type=PHP_QUERY_RFC1738){return http_build_query($query_data,$numeric_prefix,$arg_separator,$enc_type);}//生成 URL-encode 之后的请求字符串


}