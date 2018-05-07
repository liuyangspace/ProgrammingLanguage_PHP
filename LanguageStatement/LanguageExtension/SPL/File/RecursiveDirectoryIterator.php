<?php
/**
 * RecursiveDirectoryIterator
 * The RecursiveDirectoryIterator provides an interface for iterating recursively over filesystem directories.
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class RecursiveDirectoryIterator extends \RecursiveDirectoryIterator implements \SeekableIterator, \RecursiveIterator // extends \FilesystemIterator
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

    public function __construct($path,$flags=FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO){parent::__construct($path,$flags);}//Constructs a RecursiveDirectoryIterator() for the provided path.
    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//Returns an iterator for the current entry if it is a directory
    public function hasChildren(){return parent::hasChildren();}//Returns whether current entry is a directory and not '.' or '..'
    public function getSubPath(){return parent::getSubPath();}//Gets the sub path.
    public function getSubPathname(){return parent::getSubPathname();}//Gets the sub path and filename.
    // Iterator
    public function key(){return parent::key();}//Return path and filename of current dir entry
    public function next(){parent::next();}//Move to the next file
    public function rewind(){parent::rewind();}//Rewinds back to the beginning

}