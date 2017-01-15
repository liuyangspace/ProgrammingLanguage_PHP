<?php
/**
 * ArrayAccess（数组式访问）接口
 * 提供像访问数组一样访问对象的能力的接口。
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ArrayObject;


interface ArrayAccess extends \ArrayAccess
{

    abstract public function offsetExists ($offset);//检查一个偏移位置是否存在。对一个实现了 ArrayAccess 接口的对象使用 isset() 或 empty() 时，此方法将执行。
    /**
     * offsetSet 另一个值不可用，那么 offset 参数将被设置为 NULL
     * offsetSet,offsetGet 会对 key做一些类型转换（详见DataType/ArrayClass）
     */
    abstract public function offsetSet ($offset ,$value);//为指定的偏移位置设置一个值。
    abstract public function offsetGet ($offset);//获取一个偏移位置的值,当检查一个偏移位置是否为 empty() 时，此方法被执行。
    abstract public function offsetUnset ($offset);//复位一个偏移位置的值。

}