<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/31
 * Time: 17:52
 */

namespace LanguageStatement\LanguageExtension;


class Cli
{

    //cli 命令行
    public static function cli_get_process_title(){return cli_get_process_title();}//Returns the current process title,available only in CLI mode.
    public static function cli_set_process_title($title){return cli_set_process_title($title);}//Sets the process title visible in tools such as top and ps. This public static function is available only in CLI mode.
    public static function getopt($options,$longopts){return getopt($options,$longopts);}//从命令行参数列表中获取选项

}