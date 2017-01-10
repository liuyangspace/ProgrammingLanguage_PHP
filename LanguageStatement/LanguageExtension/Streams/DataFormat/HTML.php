<?php
/**
 * PHP HTML
 */

namespace LanguageStatement\LanguageExtension\Streams\DataFormat;


class HTML
{

    // html 文本操作 参见LanguageExtension/Streams/File/File
    public static function nl2br($str,$is_xhtml=true){ return nl2br($str,$is_xhtml); }// \n to <br/>
    public static function stripTags($str,$allowableTags=''){ return strip_tags($str,$allowableTags); }// 从字符串中去除 HTML 和 PHP 标记
    // html实体
    public static function htmlspecialchars($str,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8',$double_encode=true ){ return htmlspecialchars($str,$flags,$encoding,$double_encode); }//特殊字符转为html实体
    public static function htmlspecialchars_decode($str,$flags=ENT_COMPAT|ENT_HTML401){ return htmlspecialchars_decode($str,$flags); }//将特殊的 HTML 实体转换回普通字符
    public static function htmlentities($str,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8',$double_encode=true ){ return htmlentities($str,$flags,$encoding,$double_encode); }//所有字符转为html实体
    public static function html_entity_decode($str,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8' ){ return html_entity_decode ($str,$flags,$encoding); }//html实体转为所有字符
    public static function get_html_translation_table($table=HTML_SPECIALCHARS,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8'){ return get_html_translation_table($table,$flags,$encoding); }//返回使用 htmlspecialchars() 和 htmlentities() 后的转换表

}