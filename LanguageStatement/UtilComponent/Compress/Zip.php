<?php
/**
 * Zip 透明地读(写)ZIP压缩文档以及它们里面的文件。主要读取
 */

namespace LanguageStatement\UtilComponent\Compress;


class Zip
{

    public static function zip_open($filename){return zip_open($filename);}//打开一个新的ZIP归档文件进行读取。
    public static function zip_read($zip){return zip_read($zip);}//读取ZIP存档文件中下一项。
    public static function zip_entry_read($zip_entry,$length=1024){return zip_entry_read($zip_entry,$length);}//读取一个打开了的压缩目录实体
    public static function zip_entry_open($zip,$zip_entry,$mode){return zip_entry_open($zip,$zip_entry,$mode);}//打开ZIP文件中的目录实体以便后续读取。
    public static function zip_entry_name($zip_entry){return zip_entry_name($zip_entry);}//返回指定目录项的名称。
    public static function zip_entry_filesize($zip_entry){return zip_entry_filesize($zip_entry);}//返回指定目录实体的实际大小。
    public static function zip_entry_compressedsize($zip_entry){return zip_entry_compressedsize($zip_entry);}//检索目录项压缩过后的大小
    public static function zip_entry_compressionmethod($zip_entry){return zip_entry_compressionmethod($zip_entry);}//检索目录实体的压缩方法
    public static function zip_close($zip){zip_close($zip);}//关闭一个指定的ZIP档案文件。
}