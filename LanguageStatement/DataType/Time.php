<?php
/**
 * 日历，时间  参见 LanguageExtension/DateTime
 * Time 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;


class Time extends PHPTimeExtension
{
    //月份的英文
    public  $monthNames = array(
        "en" => array(
            "full" => array(1=>'January','February','March','April','May',
                'June','July','August','September','October','November','December'),

            "short" => array(1=>'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Dec')
        ),
        "es" => array(
            "full" => array(1=>'Enero','Febrero','Marzo','Abril','Mayo',
                'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Deciembre'),

            "short" => array(1=>'Ene','Feb','Mar','Abr','May','Jun',
                'Jul','Ago','Sep','Oct','Nov','Dec')
        ),
    );

}

class PHPTimeExtension extends PHPTime
{

}

class PHPTime
{

    /**
     * 时区
     */
    public static function date_default_timezone_set($timezone){ return date_default_timezone_set($timezone); }//设定用于一个脚本中所有日期时间函数的默认时区
    public static function date_default_timezone_get(){ return date_default_timezone_get(); }//取得一个脚本中所有日期时间函数所使用的默认时区
    public static function timezone_version_get(){ return timezone_version_get(); }//Returns the current version of the timezonedb
    public static function timezone_name_from_abbr($abbr,$gmtOffset=-1,$isdst=-1){ return timezone_name_from_abbr($abbr,$gmtOffset,$isdst); }//Returns the timezone name from abbreviation

    /**
     *  时间戳,format
     */
    // 时间戳,format->时间戳
    public static function time(){ return time(); }//返回当前的 Unix 时间戳
    public static function microtime($as_float){ return microtime($as_float); }//返回当前 Unix 时间戳和微秒数
    public static function strtotime($time,$now){ return strtotime($time,$now); }//将任何英文文本的日期时间描述解析为 Unix 时间戳
    public static function mktime($hour,$minute,$second,$month,$day,$year,$is_dst){ return mktime($hour,$minute,$second,$month,$day,$year,$is_dst); }//取得一个日期的 Unix 时间戳
    public static function gmmktime($hour,$minute,$second,$month,$day,$year,$is_dst){ return gmmktime($hour,$minute,$second,$month,$day,$year,$is_dst); }//取得 GMT 日期的 UNIX 时间戳
    // format,时间戳->format
    public static function date($format,$timestamp){ return date($format,$timestamp); }//格式化一个本地时间／日期
    public static function idate($format,$timestamp){ return idate($format,$timestamp); }//将本地时间日期格式化为整数,idate()只接受一个字符作为 format 参数。
    public static function gmdate($format,$timestamp){ return gmdate($format,$timestamp); }//格式化一个 GMT/UTC 日期／时间
    public static function getdate($timestamp){ return getdate($timestamp); }//取得日期／时间信息
    public static function gettimeofday($return_float=false){ return gettimeofday($return_float); }//取得当前时间
    public static function localtime($timestamp,$is_associative){ return localtime($timestamp,$is_associative); }//取得本地时间,其结构和 C 函数调用返回的完全一样。
    public static function checkdate($month,$day,$year){ return checkdate($month,$day,$year); }//验证一个格里高里日期
    public static function date_parse($date){ return date_parse($date); }//Returns associative array with detailed info about given date
    public static function date_parse_from_format($format,$date){ return date_parse_from_format($format,$date); }//Get info about given date formatted according to the specified format
    //日落 日出
    public static function date_sunrise($timestamp){ return date_sunrise($timestamp); }//返回给定的日期与地点(经纬度)的日出时间
    public static function date_sunset($timestamp){ return date_sunset($timestamp); }//返回给定的日期与地点(经纬度)的日落时间，详见手册
    public static function date_sun_info($time,$latitude,$longitude){ return date_sun_info($time,$latitude,$longitude); }//Returns an array with information about sunset/sunrise and twilight begin/end

    /**
     * 部分 别名 函数
     * DateTimeZone
     * •timezone_abbreviations_list     — 别名 DateTimeZone::listAbbreviations
     * •timezone_identifiers_list       — 别名 DateTimeZone::listIdentifiers
     * •timezone_location_get           — 别名 DateTimeZone::getLocation
     * •timezone_name_from_abbr         — Returns the timezone name from abbreviation
     * •timezone_name_get               — 别名 DateTimeZone::getName
     * •timezone_offset_get             — 别名 DateTimeZone::getOffset
     * •timezone_open                   — 别名 DateTimeZone::__construct
     * •timezone_transitions_get        — 别名 DateTimeZone::getTransitions
     * DateTime
     * •date_time_set                   — 别名 DateTime::setTime
     * •date_timestamp_get              — 别名 DateTime::getTimestamp
     * •date_timestamp_set              — 别名 DateTime::setTimestamp
     * •date_timezone_get               — 别名 DateTime::getTimezone
     * •date_timezone_set               — 别名 DateTime::setTimezone
     * •date_sub                        — 别名 DateTime::sub
     * •date_diff                       — 别名 DateTime::diff
     * •date_format                     — 别名 DateTime::format
     * •date_get_last_errors            — 别名 DateTime::getLastErrors
     * •date_interval_create_from_date_string — 别名 DateInterval::createFromDateString
     * •date_interval_format            — 别名 DateInterval::format
     * •date_isodate_set                — 别名 DateTime::setISODate
     * •date_modify                     — 别名 DateTime::modify
     * •date_offset_get                 — 别名 DateTime::getOffset
     * •date_add                        — 别名 DateTime::add
     * •date_create_from_format         — 别名 DateTime::createFromFormat
     * •date_create                     — 别名 DateTime::__construct
     * •date_date_set                   — 别名 DateTime::setDate
     * DateTimeImmutable
     * •date_create_immutable_from_format — 别名 DateTimeImmutable::createFromFormat
     * •date_create_immutable           — 别名 DateTimeImmutable::__construct
     */

    // 关联区域设置 setlocale()
    public static function gmstrftime($format,$timestamp){ return gmstrftime($format,$timestamp); }//根据区域设置格式化 GMT/UTC 时间／日期
    public static function strftime($format,$timestamp){ return strftime($format,$timestamp); }//根据区域设置格式化本地时间／日期
    public static function strptime($date,$format){ return strptime($date,$format); }//解析由 strftime() 生成的日期／时间

    // 延迟
    public static function sleep($seconds){ return sleep($seconds); }//延迟:秒数。
    public static function usleep($seconds){ usleep($seconds); }//延迟:微秒。
    public static function time_nanosleep($seconds,$nanoseconds){ return time_nanosleep($seconds,$nanoseconds); }//延迟:纳秒。

}
