<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\Image;


header ('Content-Type: image/png');

$im = @imagecreatetruecolor(120, 120)
or die('Cannot Initialize new GD image stream');

$text_color = imagecolorallocate($im, 233, 144, 191);//var_dump($text_color);

imagestring($im, 1, 5, 5,  'A Simple Text String', $text_color);

imagepng($im);

imagedestroy($im);
