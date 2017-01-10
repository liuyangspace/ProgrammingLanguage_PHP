<?php
/**
 * PHP path
 */

namespace LanguageStatement\LanguageExtension\Streams\DataFormat;


class Path
{

    // path 参见DataType/StringClass
    const PATHINFO_DIRNAME      = PATHINFO_DIRNAME;
    const PATHINFO_BASENAME     = PATHINFO_BASENAME;
    const PATHINFO_EXTENSION    = PATHINFO_EXTENSION;
    const PATHINFO_FILENAME     = PATHINFO_FILENAME;
    public static function pathinfo($path,$options){return pathinfo($path,$options);}//返回文件路径的信息
    public static function dirname($path){return dirname($path);}//返回路径中的目录部分
    public static function basename($path,$suffix){return basename($path,$suffix);}//返回路径中的文件名部分
    public static function realpath($path){return realpath($path);}//返回规范化的绝对路径名

}