<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\DataType;


trait Obj
{

    /**
     * void __clone ( void )
     * 对象复制可以通过 clone 关键字来完成（如果可能，这将调用对象的 __clone() 方法）。
     * 对象中的 __clone() 方法不能被直接调用。
     * 当复制完成时，如果定义了 __clone()方法，则新创建的对象（复制生成的对象）中的 __clone()方法会被调用，
     * 可用于修改属性的值（如果有必要的话）(PHP 5 会对对象的所有属性执行一个浅复制（shallow copy）。
     * 所有的引用属性 仍然会是一个指向原来的变量的引用。 )。
     */
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

}