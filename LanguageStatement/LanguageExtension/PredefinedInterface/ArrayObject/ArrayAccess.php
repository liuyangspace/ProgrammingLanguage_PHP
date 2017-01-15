<?php
/**
 * ArrayAccess（数组式访问）接口
 * 提供像访问数组一样访问对象的能力的接口。
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ArrayObject;


interface ArrayAccess extends \ArrayAccess
{

    abstract public function offsetExists ($offset);
    /**
     * offsetSet 另一个值不可用，那么 offset 参数将被设置为 NULL
     * offsetSet,offsetGet 会对 key做一些类型转换（详见DataType/ArrayClass）
     */
    abstract public function offsetSet ($offset ,$value);
    abstract public function offsetGet ($offset);
    abstract public function offsetUnset ($offset);

}