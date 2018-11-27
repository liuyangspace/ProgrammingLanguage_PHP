<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\DataType;


trait Str
{
    /**
     * public string __toString ( void )
     * __toString() 方法用于一个类被当成字符串时应怎样回应。例如 echo $obj; 应该显示些什么。
     * 此方法必须返回一个字符串，否则将发出一条 E_RECOVERABLE_ERROR 级别的致命错误。
     * 不能在 __toString()方法中抛出异常。这么做会导致致命错误。
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    use Debug;
}