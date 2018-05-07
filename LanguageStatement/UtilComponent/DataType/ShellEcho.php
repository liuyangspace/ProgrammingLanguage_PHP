<?php
/**
 *
 * Date: 2017/11/23
 * Time: 10:26
 */

namespace LanguageStatement\UtilComponent\DataType;

class ShellEcho
{
    public static $tmpOldShellEchoCache = '';

    public static function flushLine()
    {
        static::$tmpOldShellEchoCache='';
    }

    public static function refreshLine($newStr,$echo=true){

        $newStr=(string)$newStr;
        $outStr=static::refreshLineString(static::$tmpOldShellEchoCache,$newStr);
        static::$tmpOldShellEchoCache=$newStr;
        if($echo) echo $outStr;
        return $outStr;
    }

    public static function refreshLineString($oldStr,$newStr)
    {
        if(PHP_OS == 'WINNT'){
            $delStr="\10\177\10"; // windows
        }elseif (PHP_OS == 'Linux'){
            $delStr="\10"; // linux
        }else{
            $delStr="\10"; //
        }
        $outStr="";
        $oldCount=strlen((string)$oldStr);
        if($oldCount>0) $outStr.=str_repeat($delStr,$oldCount);
        $outStr.=(string)$newStr;
        return $outStr;
    }

    public static function test()
    {
        $count = '';
        echo '[this is test]';
        while (true){
            usleep(100);
            ShellEcho::refreshLine($count++);
            //echo ShellEcho::refreshLineString($count,++$count);
        }
    }
}