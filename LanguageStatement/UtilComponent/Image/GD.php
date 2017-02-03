<?php
/**
 * GD
 * 要编译 GD 库，需要libpng 和 libjpeg。
 * WebServer: header ('Content-Type: image/png');
 */

namespace LanguageStatement\UtilComponent\Image;


class GD
{
    public static $config=[
        'gd.jpeg_ignore_warning',//Ignore warnings created by jpeg2wbmp() and imagecreatefromjpeg()
    ];

    //
    public static function gd_info(){return gd_info();}//取得当前安装的 GD 库的信息

    // 图像资源 创建
    public static function imagecreate($width,$height){return imagecreate($width,$height);}//新建一个基于调色板的图像
    public static function imagecreatetruecolor($width,$height){return imagecreatetruecolor($width,$height);}//新建一个真彩色图像

    public static function imagecreatefromstring($image){return imagecreatefromstring($image);}//从字符串中的图像流新建一图像

    public static function imagecreatefromgif($filename){return imagecreatefromgif($filename);}//由文件或 URL 创建一个新图象。
    public static function imagecreatefromjpeg($filename){return imagecreatefromjpeg($filename);}//由文件或 URL 创建一个新图象。
    public static function imagecreatefrompng($filename){return imagecreatefrompng($filename);}//由文件或 URL 创建一个新图象。
    public static function imagecreatefromwbmp($filename){return imagecreatefromwbmp($filename);}//由文件或 URL 创建一个新图象。
    public static function imagecreatefromwebp($filename){return imagecreatefromwebp($filename);}//由文件或 URL 创建一个新图象。
    public static function imagecreatefromxbm($filename){return imagecreatefromxbm($filename);}//由文件或 URL 创建一个新图象。
    public static function imagecreatefromxpm($filename){return imagecreatefromxpm($filename);}//由文件或 URL 创建一个新图象。

    public static function imagecreatefromgd($filename){return imagecreatefromgd($filename);}//从 GD 文件或 URL 新建一图像
    public static function imagecreatefromgd2($filename){return imagecreatefromgd2($filename);}//从 GD2 文件或 URL 新建一图像
    public static function imagecreatefromgd2part($filename,$srcX,$srcY,$width,$height){return imagecreatefromgd2part($filename,$srcX,$srcY,$width,$height);}//从给定的 GD2 文件或 URL 中的部分新建一图像

    // 颜色 真彩色图像/调色板图像
    public static function imagecolorallocate($image,$red,$green,$blue){return imagecolorallocate($image,$red,$green,$blue);}// 为一幅图像分配颜色
    public static function imagecolorallocatealpha($image,$red,$green,$blue,$alpha){return imagecolorallocatealpha($image,$red,$green,$blue,$alpha);}// 为一幅图像分配颜色(带透明度)
    public static function imagecolorat($image,$x,$y){return imagecolorat($image,$x,$y);}// 取得某像素的颜色索引值
    public static function imagecolorclosesthwb($image,$red,$green,$blue){return imagecolorclosesthwb($image,$red,$green,$blue);}// 取得与给定颜色最接近的色度的黑白色的索引
    public static function imagecolorclosest($image,$red,$green,$blue){return imagecolorclosest($image,$red,$green,$blue);}// 取得与指定的颜色最接近的颜色的索引值
    public static function imagecolorclosestalpha($image,$red,$green,$blue,$alpha){return imagecolorclosestalpha($image,$red,$green,$blue,$alpha);}// 取得与指定的颜色加透明度最接近的颜色
    public static function imagecolorexact($image,$red,$green,$blue){return imagecolorexact($image,$red,$green,$blue);}//取得指定颜色的索引值
    public static function imagecolorexactalpha($image,$red,$green,$blue,$alpha){return imagecolorexactalpha($image,$red,$green,$blue,$alpha);}//取得指定的颜色加透明度的索引值
    public static function imagecolorresolve($image,$red,$green,$blue){return imagecolorresolve($image,$red,$green,$blue);}//取得指定颜色的索引值或有可能得到的最接近的替代值
    public static function imagecolorresolvealpha($image,$red,$green,$blue,$alpha){return imagecolorresolvealpha($image,$red,$green,$blue,$alpha);}//取得指定颜色 + alpha 的索引值或有可能得到的最接近的替代值
    public static function imagecolordeallocate($image,$color){return imagecolordeallocate($image,$color);}//取消图像颜色的分配
    public static function imagecolormatch($image1,$image2){return imagecolormatch($image1,$image2);}//使一个图像中调色板版本的颜色与真彩色版本更能匹配
    public static function imagecolortransparent($image,$color=null){return imagecolortransparent($image,$color);}//
    public static function imagecolorset($image,$index,$red,$green,$blue){imagecolorset($image,$index,$red,$green,$blue);}//给指定调色板索引设定颜色
    public static function imagecolorsforindex($image,$index){return imagecolorsforindex($image,$index);}//取得某索引的颜色
    public static function imagecolorstotal($image){return imagecolorstotal($image);}//取得一幅图像的调色板中颜色的数目

    // 图像资源 仿射变换，平移（Translation）、缩放（Scale）、翻转（Flip）、旋转（Rotation）和错切（Shear）。
    public static function imageaffine($image,$affine,$clip){return imageaffine($image,$affine,$clip);}//返回经过仿射变换后的图像，剪切区域可选
    public static function imageaffinematrixconcat($m1,$m2){return imageaffinematrixconcat($m1,$m2);}//Concatenate two affine transformation matrices
    public static function imageaffinematrixget($type,$options){return imageaffinematrixget($type,$options);}//Get an affine transformation matrix
    // 图像资源 拷贝，剪切
    public static function imagecopy($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h){return imagecopy($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h);}//拷贝图像的一部分
    public static function imagecopyresampled($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h){return imagecopyresampled($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h);}//重采样拷贝部分图像并调整大小
    public static function imagecopymerge($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct){return imagecopymerge($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);}//拷贝并合并图像的一部分
    public static function imagecopymergegray($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct){return imagecopymergegray($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);}//用灰度拷贝并合并图像的一部分
    public static function imagecopyresized($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h){return imagecopyresized($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h);}//拷贝部分图像并调整大小
    // 图像资源 剪切
    public static function imagecrop($image,$rect){return imagecrop($image,$rect);}//Crop an image to the given rectangle


    // 图像资源 混色
    public static function imagealphablending($image,$blendmode){return imagealphablending($image,$blendmode);}// 设定图像的混色模式
    // 图像资源 抗锯齿（antialias）功能
    public static function imageantialias($image,$enabled){return imageantialias($image,$enabled);}//是否使用抗锯齿（antialias）功能
    // 几何图形
    public static function imagearc($image,$cx,$cy,$w,$h,$s,$e,$color){return imagearc($image,$cx,$cy,$w,$h,$s,$e,$color);}//画椭圆弧
    // 文字
    public static function imagechar($image,$font,$x,$y,$c,$color){return imagechar($image,$font,$x,$y,$c,$color);}//水平地画一个字符
    public static function imagecharup($image,$font,$x,$y,$c,$color){return imagecharup($image,$font,$x,$y,$c,$color);}//垂直地画一个字符
    //
    public static function imageconvolution($image,$matrix,$div,$offset){return imageconvolution($image,$matrix,$div,$offset);}//用系数 div 和 offset 申请一个 3x3 的卷积矩阵

    // 图像资源 输出

    public static function image2wbmp($image,$filename=null,$threshold=null){return image2wbmp($image,$filename,$threshold);}//以 WBMP 格式将图像输出到浏览器或文件


    //
    public static function image_type_to_extension($imagetype,$include_dot=TRUE){return image_type_to_extension($imagetype,$include_dot);}//取得图像类型的文件后缀
    // MIME 类型
    public static function image_type_to_mime_type(){}//返回的图像类型常量的 MIME 类型
    // 图像 信息 尺寸
    public static function getimagesize($filename,&$imageinfo){return getimagesize($filename,$imageinfo);}//取得图像大小
    public static function getimagesizefromstring($imagedata,&$imageinfo){return getimagesizefromstring($imagedata,$imageinfo);}//从字符串中获取图像尺寸信息

    public static $constant=[
        // version
        'GD_VERSION',//PHP 编译所依据的 GD 版本。
        'GD_MAJOR_VERSION',//PHP 编译所依据的 GD 大版本。
        'GD_MINOR_VERSION',//PHP 编译所依据的 GD 小版本。
        'GD_RELEASE_VERSION',//PHP 编译所依据的 GD 发布版本。
        'GD_EXTRA_VERSION',//PHP 编译所依据的 GD 扩展版本（beta/rc..）。
        'GD_BUNDLED',//当使用绑定版本的 GD 时，此值为 1， 反之为 0。
        // 被 imagetypes() 函数作为返回值使用。
        'IMG_GIF',
        'IMG_JPG',
        'IMG_JPEG',
        'IMG_PNG',
        'IMG_WBMP',
        'IMG_XPM',
        // image_type_to_mime_type() 和 image_type_to_extension() 函数所用的图像类型常量。
        'IMAGETYPE_GIF',
        'IMAGETYPE_JPEG',
        'IMAGETYPE_JPEG2000',
        'IMAGETYPE_PNG',
        'IMAGETYPE_SWF',
        'IMAGETYPE_PSD',
        'IMAGETYPE_BMP',
        'IMAGETYPE_WBMP',
        'IMAGETYPE_XBM',
        'IMAGETYPE_TIFF_II',
        'IMAGETYPE_TIFF_MM',
        'IMAGETYPE_IFF',
        'IMAGETYPE_JB2',
        'IMAGETYPE_JPC',
        'IMAGETYPE_JP2',
        'IMAGETYPE_JPX',
        'IMAGETYPE_SWC',
        'IMAGETYPE_ICO',
        // 特殊的颜色选项，可以用来替代 imagecolorallocate() 或 imagecolorallocatealpha() 函数所分配的颜色
        'IMG_COLOR_TILED',
        'IMG_COLOR_STYLED',
        'IMG_COLOR_BRUSHED',
        'IMG_COLOR_STYLEDBRUSHED',
        'IMG_COLOR_TRANSPARENT',
        // imagefilledarc() 函数所用的样式常量。
        'IMG_ARC_ROUNDED',
        'IMG_ARC_PIE',
        'IMG_ARC_CHORD',
        'IMG_ARC_NOFILL',
        'IMG_ARC_EDGED',
        // imagegd2() 函数所用的类型常量。
        'IMG_GD2_RAW',
        'IMG_GD2_COMPRESSED',
        // imagelayereffect() 函数所用的透明混合效果常量。
        'IMG_EFFECT_REPLACE',
        'IMG_EFFECT_ALPHABLEND',
        'IMG_EFFECT_NORMAL',
        'IMG_EFFECT_OVERLAY',
        // imagefilter() 函数所用的 GD 滤镜。
        'IMG_FILTER_NEGATE',
        'IMG_FILTER_GRAYSCALE',
        'IMG_FILTER_BRIGHTNESS',
        'IMG_FILTER_CONTRAST',
        'IMG_FILTER_COLORIZE',
        'IMG_FILTER_EDGEDETECT',
        'IMG_FILTER_GAUSSIAN_BLUR',
        'IMG_FILTER_SELECTIVE_BLUR',
        'IMG_FILTER_EMBOSS',
        'IMG_FILTER_MEAN_REMOVAL',
        'IMG_FILTER_SMOOTH',
        'IMG_FILTER_PIXELATE',
        // imagepng() 函数所用的 PNG 滤镜。
        'PNG_NO_FILTER',
        'PNG_FILTER_NONE',
        'PNG_FILTER_SUB',
        'PNG_FILTER_UP',
        'PNG_FILTER_AVG',
        'PNG_FILTER_PAETH',
        'PNG_ALL_FILTERS',
        // 和 imageflip() 函数联合使用，自 PHP 5.5.0 可用。
        'IMG_FLIP_VERTICAL',
        'IMG_FLIP_HORIZONTAL',
        'IMG_FLIP_BOTH',
        // 和 imagesetinterpolation() 函数联合使用，自 PHP 5.5.0 可用。
        'IMG_BELL',
        'IMG_BESSEL',
        'IMG_BILINEAR_FIXED',
        'IMG_BICUBIC',
        'IMG_BICUBIC',//?
        'IMG_BLACKMAN',
        'IMG_BOX',
        'IMG_BSPLINE',
        'IMG_CATMULLROM',
        'IMG_GAUSSIAN',
        'IMG_GENERALIZED_CUBIC',
        'IMG_HERMITE',
        'IMG_HAMMING',
        'IMG_HANNING',
        'IMG_MITCHELL',
        'IMG_POWER',
        'IMG_QUADRATIC',
        'IMG_SINC',
        'IMG_NEAREST_NEIGHBOUR',
        'IMG_WEIGHTED4',
        'IMG_TRIANGLE',
    ];
}