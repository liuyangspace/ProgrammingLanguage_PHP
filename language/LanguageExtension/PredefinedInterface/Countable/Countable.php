<?php
/**
 * Countable interface
 * 类实现 Countable 可被用于 count() 函数.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Countable;


interface Countable extends \Countable
{
    public function count();
}