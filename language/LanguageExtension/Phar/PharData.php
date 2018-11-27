<?php
/**
 * PharData
 * The PharData class provides a high-level interface to accessing and creating non-executable tar and zip archives.
 */

namespace LanguageStatement\LanguageExtension\Phar;


class PharData extends \PharData // extends \Phar
{

    //
    public function __construct($fname,$flags,$alias,$format=\Phar::TAR){parent::__construct($fname,$flags,$alias,$format);}//Construct a non-executable tar or zip archive object

    public function setAlias($alias){return parent::setAlias($alias);}//dummy function (Phar::setAlias is not valid for PharData)

    public function addEmptyDir($dirname){parent::addEmptyDir($dirname);}//Add an empty directory to the tar/zip archive
    public function addFile($file,$localname){parent::addFile($file,$localname);}//Add a file from the filesystem to the tar/zip archive
    public function addFromString($localname,$contents){return parent::addFromString($localname,$contents);}//Add a file from the filesystem to the tar/zip archive
    public function buildFromDirectory($base_dir,$regex){return parent::buildFromDirectory($base_dir,$regex);}//Construct a tar/zip archive from the files within a directory.
    public function buildFromIterator(\Iterator $iter,$base_directory){return parent::buildFromIterator($iter,$base_directory);}//Construct a tar or zip archive from an iterator.
    public function compress($compression,$extension){return compress($compression,$extension);}//Compresses the entire tar/zip archive using Gzip or Bzip2 compression
    public function compressFiles($compression){return compressFiles($compression);}//Compresses all files in the current tar/zip archive
    public function convertToData($format,$compression,$extension){return parent::convertToData($format,$compression,$extension);}//Convert a phar archive to a non-executable tar or zip file

    public function copy($oldfile,$newfile){return parent::copy($oldfile,$newfile);}//Copy a file internal to the phar archive to another new file within the phar
    public function delete($entry){return parent::delete($entry);}//Delete a file within a tar/zip archive
    public function decompress($extension){return parent::decompress($extension);}//Decompresses the entire Phar archive
    public function decompressFiles(){return parent::decompressFiles();}//Decompresses all files in the current zip archive

    public function extractTo($pathto,$files,$overwrite=false){return parent::extractTo($pathto,$files,$overwrite);}//Extract the contents of a tar/zip archive to a directory

    public function isWritable(){return parent::isWritable();}//Returns true if the tar/zip archive can be modified

    public function setMetadata($metadata){parent::setMetadata($metadata);}//Sets phar archive meta-data
    public function delMetadata(){return parent::delMetadata();}//Deletes the global metadata of a zip archive

    public function setDefaultStub($index,$webindex){return parent::setDefaultStub($index,$webindex);}//dummy function (Phar::setDefaultStub is not valid for PharData)
    public function setSignatureAlgorithm($sigtype){parent::setSignatureAlgorithm($sigtype);}//set the signature algorithm for a phar and apply it.
    public function setStub($stub,$len=-1){return parent::setStub($stub,$len);}//dummy function (Phar::setStub is not valid for PharData)

    // ArrayAccess
    public function offsetExists($offset){return parent::offsetExists($offset);}//determines whether a file exists in the phar
    public function offsetSet($offset, $value){parent::offsetSet($offset, $value);}//set the contents of a file within the tar/zip to those of an external file or string
    public function offsetGet($offset){return parent::offsetGet($offset);}//Gets a PharFileInfo object for a specific file
    public function offsetUnset($offset){parent::offsetUnset($offset);}//remove a file from a tar/zip archive

}