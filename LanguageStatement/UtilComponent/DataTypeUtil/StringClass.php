<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4
 * Time: 10:00
 */

namespace LanguageStatement\UtilComponent\DataTypeUtil;


class StringClass
{

    //检测编码
    public static function detectCharset($data)
    {
        return mb_detect_encoding($data, mb_list_encodings());
    }

    //转换成目标编码（自动检测编码）
    public static function convertCharset($data,$to='UTF-8')
    {
        if (!empty($data)) {
            $charset = mb_detect_encoding($data, mb_list_encodings());
            if ($charset != $to) {
                $data = mb_convert_encoding($data, $to, $charset);
            }
            return $data;
        }
        return false;
    }

    // shell终端中刷新指定的字符串
    function shellRefresh($oldStr,$newStr){
        //$delStr="\10\177\10";//window
        $delStr="\10";//linux
        $outStr=str_repeat($delStr,strlen((string)$oldStr));
        $outStr.=(string)$newStr;
        return $outStr;
    }
}