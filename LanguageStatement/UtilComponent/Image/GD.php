<?php
/**
 * GD
 * 要编译 GD 库，需要libpng 和 libjpeg。
 * WebServer: header ('Content-Type: image/png');
 * TrueType字体，中文名称全真字体。
 * OpenType字体，是一种可缩放字型（scalable font）电脑字体类型，采用PostScript格式,扩展名为.otf.
 */

namespace LanguageStatement\UtilComponent\Image;


class GD
{
    public static $config=[
        'gd.jpeg_ignore_warning',//Ignore warnings created by jpeg2wbmp() and imagecreatefromjpeg()
    ];

    //
    public static function gd_info(){return gd_info();}//取得当前安装的 GD 库的信息
    public static function imagetypes(){return imagetypes();}//返回当前 PHP 版本所支持的图像类型

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
    // 截屏
    public static function imagegrabscreen(){return imagegrabscreen();}//Grabs a screenshot of the whole screen.
    public static function imagegrabwindow($window_handle,$client_area=0){return imagegrabwindow($window_handle,$client_area);}//Grabs a window or its client area using a windows handle (HWND property in COM instance)
    // is
    public static function imageistruecolor($image){return imageistruecolor($image);}//检查图像是否为真彩色图像
    // 真彩色图像/调色板图像
    public static function imagepalettetotruecolor($src){return imagepalettetotruecolor($src);}//Converts a palette based image to true color
    public static function imagetruecolortopalette($image,$dither,$ncolors){return imagetruecolortopalette($image,$dither,$ncolors);}//将真彩色图像转换为调色板图像
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
    // 分辨率
    public static function imageresolution($image,$res_x,$res_y){return imageresolution($image,$res_x,$res_y);}//Get or set the resolution of the image
    public static function imagesx($image){return imagesx($image);}//取得图像宽度
    public static function imagesy($image){return imagesy($image);}//取得图像高度
    // 图像资源 拷贝，剪切
    public static function imagecopy($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h){return imagecopy($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h);}//拷贝图像的一部分
    public static function imagecopyresampled($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h){return imagecopyresampled($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h);}//重采样拷贝部分图像并调整大小
    public static function imagecopymerge($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct){return imagecopymerge($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);}//拷贝并合并图像的一部分
    public static function imagecopymergegray($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct){return imagecopymergegray($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h,$pct);}//用灰度拷贝并合并图像的一部分
    public static function imagecopyresized($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h){return imagecopyresized($dst_im,$src_im,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h);}//拷贝部分图像并调整大小
    public static function imagesetclip($im,$x1,$y1,$x2,$y2){return imagesetclip($im,$x1,$y1,$x2,$y2);}//Set the clipping rectangle

    public static function imagepalettecopy($destination,$source){imagepalettecopy($destination,$source);}//将调色板从一幅图像拷贝到另一幅
    // 图像资源 剪切
    public static function imagecrop($image,$rect){return imagecrop($image,$rect);}//Crop an image to the given rectangle
    public static function imagecropauto($image,$mode=-1,$threshold=.5,$color=-1){return imagecropauto($image,$mode,$threshold,$color);}//Crop an image automatically using one of the available modes
    public static function imagegetclip($im){return imagegetclip($im);}//Get the clipping rectangle
    // 图像资源 填充
    public static function imagefill($image,$x,$y,$color){return imagefill($image,$x,$y,$color);}//区域填充
    public static function imagesettile($image,$tile){return imagesettile($image,$tile);}//设定用于填充的贴图
    // 图像资源 填补
    public static function imagesetinterpolation($image,$method=IMG_BILINEAR_FIXED){return imagesetinterpolation($image,$method);}//Set the interpolation method
    // 图像资源 旋转
    public static function imagerotate($image,$angle,$bgd_color,$ignore_transparent=0){return imagerotate($image,$angle,$bgd_color,$ignore_transparent);}//用给定角度旋转图像
    // 图像资源 混色
    public static function imagealphablending($image,$blendmode){return imagealphablending($image,$blendmode);}// 设定图像的混色模式
    // 图像资源 抗锯齿（antialias）功能
    public static function imageantialias($image,$enabled){return imageantialias($image,$enabled);}//是否使用抗锯齿（antialias）功能
    // gamma 修正
    public static function imagegammacorrect($image,$inputgamma,$outputgamma){return imagegammacorrect($image,$inputgamma,$outputgamma);}//对 GD 图像应用 gamma 修正
    // 扫描
    public static function imageinterlace($image,$interlace){return imageinterlace($image,$interlace);}//激活或禁止隔行扫描
    public static function imagescale($image,$new_width,$new_height=-1,$mode=IMG_BILINEAR_FIXED){return imagescale($image,$new_width,$new_height,$mode);}//Scale an image using the given new width and height
    // 设定 alpha 混色标志,通道信息
    public static function imagelayereffect($image,$effect){return imagelayereffect($image,$effect);}//设定 alpha 混色标志以使用绑定的 libgd 分层效果
    public static function imagesavealpha($image,$saveflag){return imagesavealpha($image,$saveflag);}//设置标记以在保存 PNG 图像时保存完整的 alpha 通道信息（与单一透明色相反）
    // 几何图形
    public static function imagesetpixel($image,$x,$y,$color){return imagesetpixel($image,$x,$y,$color);}//画一个单一像素

    public static function imagesetbrush($image,$brush){return imagesetbrush($image,$brush);}//设定画线用的画笔图像
    public static function imagesetstyle($image,$style){return imagesetstyle($image,$style);}//设定画线的风格
    public static function imagesetthickness($image,$thickness){return imagesetthickness($image,$thickness);}//设定画线的宽度

    public static function imageline($image,$x1,$y1,$x2,$y2,$color){return imageline($image,$x1,$y1,$x2,$y2,$color);}//画一条线段
    public static function imagedashedline($image,$x1,$y1,$x2,$y2,$color){return imagedashedline($image,$x1,$y1,$x2,$y2,$color);}//画一虚线
    public static function imagerectangle($image,$x1,$y1,$x2,$y2,$col){return imagerectangle($image,$x1,$y1,$x2,$y2,$col);}//画一个矩形
    public static function imagepolygon($image,Array $points,$num_points,$color){return imagepolygon($image,$points,$num_points,$color);}//画一个多边形
    public static function imageopenpolygon($image,Array $points,$num_points,$color){return imageopenpolygon($image,$points,$num_points,$color);}//Draws an open polygon
    public static function imagearc($image,$cx,$cy,$w,$h,$s,$e,$color){return imagearc($image,$cx,$cy,$w,$h,$s,$e,$color);}//画椭圆弧
    public static function imageellipse($image,$cx,$cy,$width,$height,$color){return imageellipse($image,$cx,$cy,$width,$height,$color);}//画一个椭圆
    public static function imagefilledarc($image,$cx,$cy,$width,$height,$start,$end,$color,$style){return imagefilledarc($image,$cx,$cy,$width,$height,$start,$end,$color,$style);}//画一椭圆弧且填充
    public static function imagefilledellipse($image,$cx,$cy,$width,$height,$color){return imagefilledellipse($image,$cx,$cy,$width,$height,$color);}//画一椭圆并填充
    // 文字
    public static function imagechar($image,$font,$x,$y,$c,$color){return imagechar($image,$font,$x,$y,$c,$color);}//水平地画一个字符
    public static function imagecharup($image,$font,$x,$y,$c,$color){return imagecharup($image,$font,$x,$y,$c,$color);}//垂直地画一个字符
    public static function imagestring($image,$font,$x,$y,$s,$col){return imagestring($image,$font,$x,$y,$s,$col);}//水平地画一行字符串
    public static function imagestringup($image,$font,$x,$y,$s,$col){return imagestringup($image,$font,$x,$y,$s,$col);}//垂直地画一行字符串

    public static function imagefontwidth($font){return imagefontwidth($font);}//取得字体宽度
    public static function imagefttext($image,$size,$angle,$x,$y,$color,$fontfile,$text,$extrainfo){return imagefttext($image,$size,$angle,$x,$y,$color,$fontfile,$text,$extrainfo);}//用 FreeType 2 字体将文本写入图像
    public static function imagepstext($image,$text,$font_index,$size,$foreground,$background,$x,$y,$space=0,$tightness=0,$angle=0.0,$antialias_steps=4){return imagepstext($image,$text,$font_index,$size,$foreground,$background,$x,$y,$space,$tightness,$angle,$antialias_steps);}//用 PostScript Type1 字体把文本字符串画在图像上
    public static function imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text){return imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);}//用 TrueType 字体向图像写入文本

    public static function imageloadfont($file){return imageloadfont($file);}//载入一新字体
    public static function imagepsbbox($text,$font,$size){return imagepsbbox($text,$font,$size);}//给出一个使用 PostScript Type1 字体的文本方框
    public static function imagepsloadfont($filename){return imagepsloadfont($filename);}//从文件中加载一个 PostScript Type 1 字体
    public static function imagepsencodefont($font_index,$encodingfile){return imagepsencodefont($font_index,$encodingfile);}//改变字体中的字符编码矢量
    public static function imagepsextendfont($font_index,$extend){return imagepsextendfont($font_index,$extend);}//扩充或精简字体
    public static function imagepsfreefont($font_index){return imagepsfreefont($font_index);}//放一个 PostScript Type 1 字体所占用的内存
    public static function imagepsslantfont($font_index,$slant){return imagepsslantfont($font_index,$slant);}//倾斜某字体
    public static function imagettfbbox($size,$angle,$fontfile,$text){return imagettfbbox($size,$angle,$fontfile,$text);}//取得使用 TrueType 字体的文本的范围
    //
    public static function imageftbbox($size,$angle,$fontfile,$text,$extrainfo){return imageftbbox($size,$angle,$fontfile,$text,$extrainfo);}//给出一个使用 FreeType 2 字体的文本框
    //
    public static function imageconvolution($image,$matrix,$div,$offset){return imageconvolution($image,$matrix,$div,$offset);}//用系数 div 和 offset 申请一个 3x3 的卷积矩阵
    // IPTC
    public static function iptcembed($iptcdata,$jpeg_file_name,$spool){return iptcembed($iptcdata,$jpeg_file_name,$spool);}//将二进制 IPTC 数据嵌入到一幅 JPEG 图像中
    public static function iptcparse($iptcblock){return iptcparse($iptcblock);}//将二进制 IPTC 块解析为单个标记
    // 图像资源 输出
    public static function imagejpeg($image,$filename=null,$quality=null){return imagejpeg($image,$filename,$quality);}//输出图象到浏览器或文件。
    public static function imagepng($image,$filename=null){return imagepng($image,$filename);}//以 PNG 格式将图像输出到浏览器或文件
    public static function imagegif($image,$filename=null){return imagegif($image,$filename);}//输出图象到浏览器或文件。
    public static function imagewbmp($image,$filename=null,$foreground=null){return imagewbmp($image,$filename,$foreground);}//以 WBMP 格式将图像输出到浏览器或文件
    public static function imagexbm($image,$filename=null,$foreground=null){return imagexbm($image,$filename,$foreground);}//将 XBM 图像输出到浏览器或文件
    public static function imagewebp($image,$filename,$quality=80){return imagewebp($image,$filename,$quality);}//将 WebP 格式的图像输出到浏览器或文件
    public static function image2wbmp($image,$filename=null,$threshold=null){return image2wbmp($image,$filename,$threshold);}//以 WBMP 格式将图像输出到浏览器或文件
    public static function imagegd2($image,$filename,$chunk_size,$type=IMG_GD2_RAW){return imagegd2($image,$filename,$chunk_size,$type);}//将 GD2 图像输出到浏览器或文件
    public static function imagegd($image,$filename=null){return imagegd($image,$filename);}//将 GD 图像输出到浏览器或文件
    // 图像格式转换
    public static function jpeg2wbmp($jpegname,$wbmpname,$dest_height,$dest_width,$threshold){return jpeg2wbmp($jpegname,$wbmpname,$dest_height,$dest_width,$threshold);}//将 JPEG 图像文件转换为 WBMP 图像文件
    public static function png2wbmp($pngname,$wbmpname,$dest_height,$dest_width,$threshold){return png2wbmp($pngname,$wbmpname,$dest_height,$dest_width,$threshold);}//将 PNG 图像文件转换为 WBMP 图像文件
    // 图像资源 销毁
    public static function imagedestroy($image){return imagedestroy($image);}//销毁一图像
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