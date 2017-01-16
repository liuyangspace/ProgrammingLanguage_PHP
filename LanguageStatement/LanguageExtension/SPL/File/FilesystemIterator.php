<?php
/**
 * FilesystemIterator
 * The Filesystem iterator
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class FilesystemIterator extends \FilesystemIterator implements \SeekableIterator // extends \DirectoryIterator
{
    /* 常量 */
    const CURRENT_AS_PATHNAME   = 32 ;  // Makes FilesystemIterator::current() return the pathname.
    const CURRENT_AS_FILEINFO   = 0 ;   // Makes FilesystemIterator::current() return an SplFileInfo instance.
    const CURRENT_AS_SELF       = 16 ;  // Makes FilesystemIterator::current() return $this (the FilesystemIterator).
    const CURRENT_MODE_MASK     = 240 ; // Masks FilesystemIterator::current()
    const KEY_AS_PATHNAME       = 0 ;   // Makes FilesystemIterator::key() return the pathname.
    const KEY_AS_FILENAME       = 256 ; // Makes FilesystemIterator::key() return the filename.
    const FOLLOW_SYMLINKS       = 512 ; // Makes RecursiveDirectoryIterator::hasChildren() follow symlinks.
    const KEY_MODE_MASK         = 3840 ;// Masks FilesystemIterator::key()
    const NEW_CURRENT_AND_KEY   = 256 ; // Same as FilesystemIterator::KEY_AS_FILENAME | FilesystemIterator::CURRENT_AS_FILEINFO.
    const SKIP_DOTS             = 4096 ;// Skips dot files (. and ..).
    const UNIX_PATHS            = 8192 ;// Makes paths use Unix-style forward slash irrespective of system default. Note that the path that is passed to the constructor is not modified.

    public function __construct($path,$flags){parent::__construct($path,$flags);}//Constructs a new filesystem iterator from the path.
    public function setFlags($flags=null){parent::setFlags($flags);}//Sets handling flags(FilesystemIterator constants)
    public function getFlags(){return parent::getFlags();}//Get the handling flags(FilesystemIterator constants)
    // Iterator
    public function current(){return parent::current();}//Get file information of the current element.
    public function key(){return parent::key();}//Retrieve the key for the current file
    public function next(){parent::next();}//Move to the next file
    public function rewind(){parent::rewind();}//Rewinds back to the beginning
    /* 继承的方法 参见 DirectoryIterator */
}