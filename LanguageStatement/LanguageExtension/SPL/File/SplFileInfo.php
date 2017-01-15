<?php
/**
 * SplFileInfo
 * The SplFileInfo class offers a high-level object oriented interface to information for an individual file.
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class SplFileInfo extends \SplFileInfo
{

    public function __construct($filename){parent::__construct($filename);}//Creates a new SplFileInfo object for the file_name specified. The file does not need to exist, or be readable.

    // 文件类型 目录、文件、连接
    public function isDir(){return parent::isDir();}//Tells if the file is a directory
    public function isFile(){return parent::isFile();}//Tells if the object references a regular file
    public function isLink(){return parent::isLink();}//Tells if the file is a link
    // 文件权限 可读、可写、可执行
    public function isReadable(){return parent::isReadable();}//Tells if file is readable
    public function isWritable(){return parent::isWritable();}//Tells if the entry is writable
    public function isExecutable(){return parent::isExecutable();}//Tells if the file is executable
    public function getPerms(){return parent::getPerms();}//Gets file permissions
    // path
    public function getBasename($suffix){return parent::getBasename($suffix);}//Gets the base name of the file
    public function getFilename(){return parent::getFilename();}//Gets the filename
    public function getExtension(){return parent::getExtension();}//Gets the file extension
    public function getPath(){return parent::getPath();}//Gets the path without filename
    public function getPathname(){return parent::getPathname();}//Gets the path to the file
    public function getRealPath(){return parent::getRealPath();}//Gets absolute path to file
    // time
    public function getATime(){return parent::getATime();}//文件存取访问时间
    public function getMTime(){return parent::getMTime();}//Gets the last modified time
    public function getCTime(){return parent::getCTime();}//获取文件 inode 修改时间
    // 权限信息
    public function getOwner(){return parent::getOwner();}//The owner ID is returned in numerical format.
    public function getGroup(){return parent::getGroup();}//The group ID is returned in numerical format
    public function getInode(){return parent::getInode();}//Gets the inode number for the filesystem object.
    //
    public function getLinkTarget(){return parent::getLinkTarget();}//Gets the target of a link
    public function getSize(){return parent::getSize();}//Gets file size
    public function getType(){return parent::getType();}//Gets file type
    // get SplFileInfo
    public function setInfoClass($class_name="SplFileInfo"){parent::setInfoClass($class_name);}//Sets the class used with SplFileInfo::getFileInfo() and SplFileInfo::getPathInfo()
    public function getFileInfo($class_name){return parent::getFileInfo($class_name);}//Gets an SplFileInfo object for the file
    public function getPathInfo($class_name){return parent::getPathInfo($class_name);}//Gets an SplFileInfo object for the path
    // get SplFileObject
    public function setFileClass($class_name="SplFileObject"){parent::setFileClass($class_name);}//Sets the class used with SplFileInfo::openFile()
    public function openFile($open_mode="r",$use_include_path=false,$context=NULL){return openFile($open_mode,$use_include_path,$context);}//Gets an SplFileObject object for the file
    //
    public function __toString(){return parent::__toString();}//Returns the path to the file as a string

}