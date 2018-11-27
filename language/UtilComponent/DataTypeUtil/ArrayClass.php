<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4
 * Time: 9:59
 */

namespace LanguageStatement\UtilComponent\DataTypeUtil;


class ArrayClass
{
    public static function arrayToJson($arr)
    {
        return json_encode($arr);
    }
}