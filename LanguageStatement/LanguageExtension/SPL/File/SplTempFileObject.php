<?php
/**
 * SplTempFileObject
 * The SplTempFileObject class offers an object oriented interface for a temporary file
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class SplTempFileObject extends \SplTempFileObject implements \SeekableIterator, \RecursiveIterator // \SplFileObject
{

    public function __construct($max_memory){parent::__construct($max_memory);}//
    /* 实现、继承的方法 */
    // SplFileInfo (参见 SplFileInfo)
}