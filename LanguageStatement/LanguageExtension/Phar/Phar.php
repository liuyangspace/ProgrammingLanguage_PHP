<?php
/**
 * Phar
 * Phar archives are similar in concept to Java JAR archives,
 * The Phar class provides a high-level interface to accessing and creating phar archives.
 */

namespace LanguageStatement\LanguageExtension\Phar;


class Phar extends \Phar implements \Countable, \ArrayAccess // extends \RecursiveDirectoryIterator,\PHP_Archive
{
    protected static $config=[
        'phar.readonly',// This option disables creation or modification of Phar archives using the phar stream or Phar object's write support
        'phar.require_hash',// This option will force all opened Phar archives to contain some kind of signature (currently MD5,
        // SHA1, SHA256 and SHA512 are supported), and will refuse to process any Phar archive that does not contain a signature
        'phar.extract_list',// This INI setting has been removed as of phar 2.0.0
        'phar.cache_list',// This INI setting was added in phar 2.0.0
    ];

    /* 常量 */
    // RecursiveDirectoryIterator
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
    // Start of Phar v.2.0.1
    const BZ2                   = 8192;
    const GZ                    = 4096;
    const NONE                  = 0;
    const PHAR                  = 1;
    const TAR                   = 2;
    const ZIP                   = 3;
    const COMPRESSED            = 61440;
    const PHP                   = 0;
    const PHPS                  = 1;
    const MD5                   = 1;
    const OPENSSL               = 16;
    const SHA1                  = 2;
    const SHA256                = 3;
    const SHA512                = 4;

    /**
     * final static method
     * final public static string   apiVersion ( void ) , Returns the api version
     * final public static bool     canCompress ([ int $type = 0 ] ) , Returns whether phar extension supports compression using either zlib or bzip2
     * final public static bool     canWrite ( void ) , Returns whether phar extension supports writing and creating phars
     */
    public function __construct($fname,$flags,$alias){parent::__construct($fname,$flags,$alias);}//

    // create
    // final public static void     webPhar ([ string $alias [, string $index = "index.php" [, string $f404 [, array $mimetypes [, callable $rewrites ]]]]] ) , mapPhar for web-based phars. front controller for web applications
    // final public static bool     loadPhar ( string $filename [, string $alias ] ) , Loads any phar archive with an alias
    // final public static bool     mapPhar ([ string $alias [, int $dataoffset = 0 ]] ) , Reads the currently executed file (a phar) and registers its manifest
    // final public static void     mount ( string $pharpath , string $externalpath ) , Mount an external path or file to a virtual location within the phar archive
    // final public static void     mungServer ( array $munglist ) , Defines a list of up to 4 $_SERVER variables that should be modified for execution
    // final public static string   running ([ bool $retphar = true ] ) , Returns the full path on disk or full phar URL to the currently executing Phar archive
    public function buildFromDirectory($base_dir,$regex){return parent::buildFromDirectory($base_dir,$regex);}//Construct a phar archive from the files within a directory.
    public function buildFromIterator(\Iterator $iter,$base_directory){parent::buildFromIterator($iter,$base_directory);}//Construct a phar archive from an iterator.
    // Stub
    public function createDefaultStub($indexfile,$webindexfile){return parent::createDefaultStub($indexfile,$webindexfile);}//Create a phar-file format specific stub
    public function getStub(){return parent::getStub();}//Return the PHP loader or bootstrap stub of a Phar archive
    public function setStub($stub,$len=-1){return parent::setStub($stub,$len);}//Used to set the PHP loader or bootstrap stub of a Phar archive
    public function setDefaultStub($index,$webindex){return parent::setDefaultStub($index,$webindex);}//Used to set the PHP loader or bootstrap stub of a Phar archive to the default loader
    // add
    public function addEmptyDir($dirName){parent::addEmptyDir($dirName);}//添加一个空目录到 phar 档案
    public function addFile($fromFile,$toFile){parent::addFile($fromFile,$toFile);}//将一个文件从文件系统添加到 phar 档案中
    public function addFromString($localname,$contents){parent::addFromString($localname,$contents);}//以字符串的形式添加一个文件到 phar 档案
    // is has
    public function isCompressed(){return parent::isCompressed();}//Returns Phar::GZ or PHAR::BZ2 if the entire phar archive is compressed (.tar.gz/tar.bz and so on)
    public function isFileFormat($format){return parent::isFileFormat($format);}//Returns true if the phar archive is based on the tar/phar/zip file format depending on the parameter
    public function isValidPharFilename($filename,$executable=true){return parent::isValidPharFilename($filename,$executable);}//Returns whether the given filename is a valid phar filename
    public function isWritable(){return parent::isWritable();}//Returns true if the phar archive can be modified
    // set options
    // final public static void  Phar::interceptFileFuncs ( void ) , instructs phar to intercept fopen, file_get_contents, opendir, and all of the stat-related functions
    public function setAlias($alias){return parent::setAlias($alias);}//Set the alias for the Phar archive
    public function setSignatureAlgorithm($sigtype,$privatekey){parent::setSignatureAlgorithm($sigtype,$privatekey);}//set the signature algorithm for a phar and apply it.
    // get info
    public function getVersion(){return parent::getVersion();}//Return version info of Phar archive
    public function getSignature(){return parent::getSignature();}//Return MD5/SHA1/SHA256/SHA512/OpenSSL signature of a Phar archive
    public function getModified(){return parent::getModified();}//Return whether phar was modified
    // final public static array getSupportedSignatures ( void ) , Return array of supported signature types
    // final public static array getSupportedCompression ( void ) , Return array of supported compression algorithms
    // 档案操作
    public function copy($oldfile,$newfile){return parent::copy($oldfile,$newfile);}//Copy a file internal to the phar archive to another new file within the phar
    public function delete($entry){return delete($entry);}//删除 phar 档案中的一个文件
    // final public static bool Phar::unlinkArchive ( string $archive ) , Completely remove a phar archive from disk and from memory
    // buffering
    public function startBuffering(){parent::startBuffering();}//Start buffering Phar write operations, do not modify the Phar object on disk
    public function isBuffering(){return parent::isBuffering();}//Used to determine whether Phar write operations are being buffered, or are flushing directly to disk
    public function stopBuffering(){parent::stopBuffering();}//Stop buffering write requests to the Phar archive, and save changes to disk
    // Extract
    public function extractTo($pathto,$files,$overwrite=false){return parent::extractTo($pathto,$files,$overwrite);}//Extract the contents of a phar archive to a directory
    // Compress
    public function compress($compression,$extension){return parent::compress($compression,$extension);}//Compresses the entire Phar archive using Gzip or Bzip2 compression
    public function compressFiles($compression){parent::compressFiles($compression);}//Compresses all files in the current Phar archive
    public function convertToData($format=9021976,$compression=9021976,$extension){return parent::convertToData($format,$compression,$extension);}//Convert a phar archive to a non-executable tar or zip file
    public function convertToExecutable($format=9021976,$compression=9021976,$extension){return parent::convertToExecutable($format,$compression,$extension);}//Convert a phar archive to another executable phar archive file format
    public function decompress($extension){return parent::decompress($extension);}//Decompresses the entire Phar archive
    public function decompressFiles(){return parent::decompressFiles();}//Decompresses all files in the current Phar archive
    // metadata
    public function setMetadata($metadata){parent::setMetadata($metadata);}//Sets phar archive meta-data
    public function hasMetadata(){parent::hasMetadata();}//Returns whether phar has global meta-data
    public function getMetadata(){return parent::getMetadata();}//Returns phar archive meta-data
    public function delMetadata(){return parent::delMetadata();}//Deletes the global metadata of the phar
    /**
     * 方法从 phar 扩展 2.0.0以上版本中删除
     * public bool Phar::compressAllFilesBZIP2 ( void ) , Compresses all files in the current Phar archive using Bzip2 compression
     * public bool Phar::compressAllFilesGZ ( void ) , Compresses all files in the current Phar archive using Gzip compression
     * public bool Phar::uncompressAllFiles ( void ) , Uncompresses all files in the current Phar archive
     */
    // ArrayAccess
    public function offsetExists($offset){return parent::offsetExists($offset);}//determines whether a file exists in the phar
    public function offsetSet($offset, $value){parent::offsetSet($offset, $value);}//set the contents of an internal file to those of an external file
    public function offsetGet($offset){return parent::offsetGet($offset);}//Gets a PharFileInfo object for a specific file
    public function offsetUnset($offset){parent::offsetUnset($offset);}//remove a file from a phar
    // Countable
    public function count(){return parent::count();}//Returns the number of entries (files) in the Phar archive

}