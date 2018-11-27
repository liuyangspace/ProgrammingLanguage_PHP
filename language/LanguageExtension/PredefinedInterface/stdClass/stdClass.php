<?php
/**
 * stdClass 类
 * 其他类型数据转换为对象时 实例化为此类
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\stdClass;


class stdClass extends \stdClass
{
    //如果该值为 NULL，则新的实例为空。

    //数组转换成对象将使键名成为属性名并具有相对应的值。

    //对于任何其它的值，名为 scalar 的成员变量将包含该值。
    public $scalar;
}