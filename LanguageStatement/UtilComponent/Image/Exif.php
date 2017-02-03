<?php
/**
 * Exif
 */

namespace LanguageStatement\UtilComponent\Image;


class Exif
{
    public static $config=[
        'exif.encode_unicode',//exif.encode_unicode 定义了 UNICODE 用户注释被处理的字符集。默认为 ISO-8859-15
        'exif.decode_unicode_motorola',//定义了 Unicode 编码的用户注释的图像内部字符集，默认为 UCS-2BE。
        'exif.decode_unicode_intel',//定义了 Unicode 编码的用户注释的图像内部字符集,默认为 UCS-2LE。
        'exif.encode_jis',//定义了 JIS 用户注释被处理的字符集。默认为空值
        'exif.decode_jis_motorola',//定义了 JIS 编码的用户注释的图像内部字符集，默认为 JIS。
        'exif.decode_jis_intel',//定义了 JIS 编码的用户注释的图像内部字符集，默认为 JIS。
    ];

    public static $constant=[
        'IMAGETYPE_GIF',
        'IMAGETYPE_JPEG',
        'IMAGETYPE_PNG',
        'IMAGETYPE_SWF',
        'IMAGETYPE_PSD',
        'IMAGETYPE_BMP',
        'IMAGETYPE_TIFF_II',
        'IMAGETYPE_TIFF_MM',
        'IMAGETYPE_JPC',
        'IMAGETYPE_JP2',
        'IMAGETYPE_JPX',
        'IMAGETYPE_JB2',
        'IMAGETYPE_SWC',
        'IMAGETYPE_IFF',
        'IMAGETYPE_WBMP',
        'IMAGETYPE_XBM',
    ];

    public static function exif_imagetype($filename){return exif_imagetype($filename);}//判断一个图像的类型
    public static function exif_read_data($filename,$sections=NULL,$arrays=false,$thumbnail=false){return exif_read_data($filename,$sections,$arrays,$thumbnail);}//从 JPEG 或 TIFF文件中读取 EXIF 头信息
    public static function read_exif_data($filename,$sections=NULL,$arrays=false,$thumbnail=false){return read_exif_data($filename,$sections,$arrays,$thumbnail);}//别名 exif_read_data()
    public static function exif_tagname($index){return exif_tagname($index);}//获取指定索引的头名称
    public static function exif_thumbnail($index,&$width=null,&$height=null,&$imagetype){return exif_thumbnail($index,$width,$height,$imagetype);}//获取指定索引的头名称
}