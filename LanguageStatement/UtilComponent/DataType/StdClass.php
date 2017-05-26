<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\DataType;


trait StdClass
{
    /**
     * 如果将一个对象转换成对象，它将不会有任何变化。如果其它任何类型的值被转换成对象，将会创建一个内置类 stdClass 的实例。
     * 如果该值为 NULL，则新的实例为空。数组转换成对象将使键名成为属性名并具有相对应的值。对于任何其它的值，名为 scalar
     * 的成员变量将包含该值。
     */
    public $scalar;

    use PropertyContainer;
    use MethodContainer;

}