<?php
/**
 * SplFixedArray 阵列
 */

namespace LanguageStatement\LanguageExtension\SPL\DataStructure;


class SplFixedArray extends \SplFixedArray implements \Iterator, \ArrayAccess, \Countable
{
    public function __construct($size){parent::__construct($size);}//
}