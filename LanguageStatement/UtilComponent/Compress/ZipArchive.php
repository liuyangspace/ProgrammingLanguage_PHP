<?php
/**
 * 一个用 Zip ()压缩的文件存档。
 */

namespace LanguageStatement\UtilComponent\Compress;


class ZipArchive extends \ZipArchive
{
    //创建
    const CREATE        = parent::CREATE;//如果不存在则创建一个zip压缩包。
    const OVERWRITE     = parent::OVERWRITE;//总是以一个新的压缩包开始，此模式下如果已经存在则会被覆盖。
    const EXCL          = parent::EXCL;//如果压缩包已经存在，则出错。
    const CHECKCONS     = parent::CHECKCONS;//对压缩包执行额外的一致性检查，如果失败则显示错误。
    public function open($filename,$flags=null){return parent::open($filename,$flags);}//Open a ZIP file archive
    //add
    public function addEmptyDir($dirname){return parent::addEmptyDir($dirname);}//Add a new directory
    public function addFile($filename,$localname=null,$start=0,$length=0){return parent::addFile($filename,$localname,$start,$length);}//Adds a file to a ZIP archive from the given path
    public function addFromString($localname, $contents){return parent::addFromString($localname, $contents);}//Add a file to a ZIP archive using its contents
    public function addGlob($pattern,$flags=0,array $options=array()){return parent::addGlob($pattern,$flags,$options);}//Add files from a directory by glob pattern
    public function addPattern($pattern,$path='.', array $options=array()){return parent::addPattern($pattern,$path,$options);}//Add files from a directory by PCRE pattern
    //set
    public function renameIndex($index,$newname){parent::renameIndex($index,$newname);}//Renames an entry defined by its index.
    public function renameName($name,$newname){parent::renameName($name,$newname);}//Renames an entry defined by its name
    public function setArchiveComment($comment){parent::setArchiveComment($comment);}//Set the comment of a ZIP archive
    public function setCommentIndex($index,$comment){parent::setCommentIndex($index,$comment);}//Set the comment of an entry defined by its index
    public function setCommentName($name,$comment){parent::setCommentName($name,$comment);}//Set the comment of an entry defined by its name
    public function setCompressionIndex($index,$comp_method,$comp_flags=0){parent::setCompressionIndex($index,$comp_method,$comp_flags);}//Set the compression method of an entry defined by its index.
    public function setCompressionName($name,$comp_method,$comp_flags=0){parent::setCompressionName($name,$comp_method,$comp_flags);}//Set the compression method of an entry defined by its name.
    public function setExternalAttributesIndex($index,$opsys,$attr,$flags){parent::setsetExternalAttributesIndex($index,$opsys,$attr,$flags);}//Set the external attributes of an entry defined by its index.
    public function setExternalAttributesName($index,$opsys,$attr,$flags){parent::setsetExternalAttributesName($index,$opsys,$attr,$flags);}//Set the external attributes of an entry defined by its name.
    public function setPassword($password){parent::setPassword($password);}//Sets the password for the active archive.
    //Undo 撤销
    public function unchangeAll(){parent::unchangeAll();}//Undo all changes done in the archive.
    public function unchangeArchive(){parent::unchangeArchive();}//Revert all global changes done in the archive
    public function unchangeIndex($index){parent::unchangeIndex($index);}//Revert all changes done to an entry at the given index.
    public function unchangeName($name){parent::unchangeName($name);}//Revert all changes done to an entry.
    //get
    public function statIndex($index,$flags=null){return parent::statIndex($index, $flags);}//Get the details of an entry defined by its index.
    public function statName($name,$flags=null){return parent::statName($name, $flags);}//Get the details of an entry defined by its name.
    public function getFromIndex($index,$length=0,$flags=null){parent::getFromIndex($index,$length,$flags);}//Returns the entry contents using its index.
    public function getFromName($name,$length=0,$flags=null){parent::getFromName($name,$length,$flags);}//Returns the entry contents using its name.
    public function getNameIndex($index, $flags=null){parent::getNameIndex($index,$flags);}//Returns the name of an entry using its index.
    public function locateName($name,$flags=null){parent::locateName($name,$flags);}//Locates an entry using its name.
    public function getStatusString(){parent::getStatusString();}//Returns the status error message, system and/or zip messages.
    public function getStream($name){parent::getStream($name);}//Get a file handler to the entry defined by its name. For now it only supports read operations.
    public function getArchiveComment($flags=null){return parent::getArchiveComment($flags);}//Returns the Zip archive comment.
    public function getCommentIndex($index,$flags=null){return parent::getCommentIndex($index, $flags);}//Returns the comment of an entry using the entry index.
    public function getCommentName($name,$flags=null){parent::getCommentName($name,$flags);}//Returns the entry contents using its name.
    public function getExternalAttributesIndex($index,&$opsys,&$attr,$flags){return parent::getExternalAttributesIndex($index,$opsys,$attr,$flags);}//Retrieve the external attributes of an entry defined by its index.
    public function getExternalAttributesName($index,&$opsys,&$attr,$flags){return parent::getExternalAttributesName($index,$opsys,$attr,$flags);}//Retrieve the external attributes of an entry defined by its Name.
    //delete
    public function deleteIndex($index){return parent::deleteIndex($index);}//Delete an entry in the archive using its index.
    public function deleteName($name){return parent::deleteName($name);}//Delete an entry in the archive using its name.
    //extract 解压
    public function extractTo($destination,$entries=null){return parent::extractTo($destination,$entries);}//Extract the archive contents
    //
    public function close(){return parent::close();}//Close the active archive
}