<?php
/**
 * SplFileObject
 * SplFileObject类为文件提供了一个面向对象接口.
 */

namespace LanguageStatement\LanguageExtension\SPL\File;


class SplFileObject extends \SplFileObject implements \RecursiveIterator, \SeekableIterator // extends SplFileInfo
{
    /* 常量 */
    const DROP_NEW_LINE     = 1 ;   // Drop newlines at the end of a line.
    const READ_AHEAD        = 2 ;   // Read on rewind/next.
    const SKIP_EMPTY        = 4 ;   // Skips empty lines in the file. This requires the READ_AHEAD flag be enabled, to work as expected.
    const READ_CSV          = 8 ;   // Read lines as CSV rows.

    public function __construct($filename,$open_mode="r",$use_include_path=false,$context){parent::__construct($filename,$open_mode,$use_include_path,$context);}//Construct a new file object.
    public function __toString(){return parent::__toString();}//Alias of SplFileObject::current()
    // 文件 信息、选项
    public function getFlags(){return parent::getFlags();}//Gets flags for the SplFileObject
    public function setFlags($flags){return parent::setFlags($flags);}//Sets flags for the SplFileObject
    public $operation=[
        LOCK_SH,//to acquire a shared lock (reader).
        LOCK_EX,//to acquire an exclusive lock (writer).
        LOCK_UN,//to release a lock (shared or exclusive).
        LOCK_NB,//to not block while locking (not supported on Windows).
    ];
    public function flock($operation,&$wouldblock){return parent::flock($operation,$wouldblock);}//Locks or unlocks the file in the same portable way as flock().
    public function fflush(){return parent::fflush();}//Forces a write of all buffered output to the file.
    public function fstat(){return parent::fstat();}//Gets information about the file

    public function getMaxLineLen(){return parent::getMaxLineLen();}//Gets the maximum line length as set by SplFileObject::setMaxLineLen().
    public function setMaxLineLen($max_len){parent::setMaxLineLen($max_len);}//Set maximum line length
    public function ftruncate($size){return parent::ftruncate($size);}//Truncates the file to a given length
    public $whence=[
        SEEK_SET,//Set position equal to offset bytes.
        SEEK_CUR,//Set position to current location plus offset.
        SEEK_END,//Set position to end-of-file plus offset.
    ];
    public function fseek($offset,$whence=SEEK_SET){return parent::fseek($offset,$whence);}//Seek to a position
    public function ftell(){return parent::ftell();}//Return current file position
    /* 文件 IO */
    //
    public function fread($length){return parent::fread($length);}//Reads the given number of bytes from the file.
    public function fwrite($str,$length){return parent::fwrite($str,$length);}//Write to file
    public function fgetc(){return parent::fgetc();}//Gets a character from the file.
    public function fgets(){return parent::fgets();}//Gets a line from the file.
    public function getCurrentLine(){return parent::getCurrentLine();}//alias of SplFileObject::fgets().
    public function fgetss($allowable_tags){return parent::fgetss($allowable_tags);}//Gets line from file and strip HTML tags
    // csv
    public function fgetcsv($delimiter=",",$enclosure="\"",$escape="\\"){return parent::fgetcsv($delimiter,$enclosure,$escape);}//Gets line from file and parse as CSV fields
    public function fputcsv($fields,$delimiter=",",$enclosure='"',$escape='\\'){return parent::fputcsv($fields,$delimiter,$enclosure,$escape);}//Writes the fields array to the file as a CSV line.
    public function getCsvControl(){return parent::getCsvControl();}//Get the delimiter, enclosure and escape character for CSV
    public function setCsvControl($delimiter=",",$enclosure="\"",$escape = "\\"){return parent::getCsvControl();}//Set the delimiter, enclosure and escape character for CSV
    //
    public function eof(){return parent::eof();}//Determine whether the end of file has been reached
    public function fpassthru(){return parent::fpassthru();}//Output all remaining data on a file pointer
    public function fscanf($format,...$var){return parent::fscanf($format,...$var);}//Parses input from file according to a format

    /* 实现、继承的方法 */
    // RecursiveIterator
    public function getChildren(){return parent::getChildren();}//returns NULL.
    public function hasChildren(){return parent::hasChildren();}//returns NULL.
    // SeekableIterator
    public function seek($line_pos){parent::seek($line_pos);}//Seek to specified line in the file.
    // Iterator
    public function current(){return parent::current();}//Retrieve current line of file
    public function key(){return parent::key();}//Gets the current line number.
    public function next(){parent::next();}//Moves ahead to the next line in the file.
    public function rewind(){parent::rewind();}//Rewinds the file back to the first line.
    public function valid(){return parent::valid();}//Check whether EOF has been reached.
    // SplFileInfo (参见 SplFileInfo)
}