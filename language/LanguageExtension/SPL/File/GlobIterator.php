<?php
/**
 * GlobIterator
 * 遍历一个文件系统行为类似于 glob() （寻找与模式匹配的文件路径）.
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class GlobIterator extends \GlobIterator implements \SeekableIterator, \Countable // extends \FilesystemIterator
{

    public function __construct($path, $flags){parent::__construct($path, $flags);}//Construct a directory using glob
    public function count(){return parent::count();}//Get the number of directories and files
    /* 继承的方法 参见 FilesystemIterator */
}