<?php
/**
 * DirectoryIterator
 * The DirectoryIterator class provides a simple interface for viewing the contents of filesystem directories.
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class DirectoryIterator extends \DirectoryIterator implements \SeekableIterator // extends SplFileInfo
{

    public function __construct($path){return parent::__construct($path);}//Constructs a new directory iterator from a path.
    public function __toString(){return parent::__toString();}//Get file name as a string
    // time
    public function getATime(){return parent::getATime();}//Get last access time of the current DirectoryIterator item
    public function getMTime(){return parent::getMTime();}//Get last modification time of current DirectoryIterator item
    public function getCTime(){return parent::getCTime();}//Get inode change time of the current DirectoryIterator item
    // path
    public function getBasename($suffix){return parent::getBasename($suffix);}//Get base name of current DirectoryIterator item.
    public function getFilename(){return parent::getFilename();}//Return file name of current DirectoryIterator item.
    public function getExtension(){return parent::getExtension();}//Gets the file extension
    public function getPath(){return parent::getPath();}//Get path of current Iterator item without filename
    public function getPathname(){return parent::getPathname();}//Return path and file name of current DirectoryIterator item
    // 文件类型 目录、文件、连接
    public function isDot(){return parent::isDot();}//Determine if current DirectoryIterator item is '.' or '..'
    public function isDir(){return parent::isDir();}//Determine if current DirectoryIterator item is a directory
    public function isFile(){return parent::isFile();}//Determine if current DirectoryIterator item is a regular file
    public function isLink(){return parent::isLink();}//Determine if current DirectoryIterator item is a symbolic link
    // 权限信息
    public function getOwner(){return parent::getOwner();}//Get owner of current DirectoryIterator item
    public function getGroup(){return parent::getGroup();}//Get group for the current DirectoryIterator item
    public function getInode(){return parent::getInode();}//Get inode for the current DirectoryIterator item
    // 文件权限 可读、可写、可执行
    public function isReadable(){return parent::isReadable();}//Determine if current DirectoryIterator item can be read
    public function isWritable(){return parent::isWritable();}//Determine if current DirectoryIterator item can be written to
    public function isExecutable(){return parent::isExecutable();}//Determine if current DirectoryIterator item is executable
    public function getPerms(){return parent::getPerms();}//Gets file permissions
    //
    public function getSize(){return parent::getSize();}//Get size of current DirectoryIterator item
    public function getType(){return parent::getType();}//Determine the type of the current DirectoryIterator item
    // SeekableIterator
    public function seek($position){parent::seek($position);}//Seek to a DirectoryIterator item
    // Iterator
    public function current(){return parent::current();}//Get the current DirectoryIterator item.
    public function key(){return parent::key();}//Return the key for the current DirectoryIterator item
    public function next(){parent::next();}//Move forward to next DirectoryIterator item
    public function rewind(){parent::rewind();}//Rewind the DirectoryIterator back to the start
    public function valid(){parent::valid();}//Check whether current DirectoryIterator position is a valid file

}