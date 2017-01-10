<?php
/**
 * streamWrapper (NOT a real class) 数据流封装类
 * This is NOT a real class, only a prototype of how a class defining its own protocol should be.
 * Allows you to implement your own protocol handlers and streams
 * for use with all the other filesystem functions (such as fopen(), fread() etc.).
 */

namespace LanguageStatement\LanguageExtension\Streams;


interface streamWrapper
{
    public function __construct();//Constructs a new stream wrapper
    public function __destruct();//Destructs an existing stream wrapper
    // directory
    public function dir_opendir($path,$options);//Open directory handle
    public function dir_closedir();//Close directory handle
    public function dir_readdir();//Read entry from directory handle
    public function dir_rewinddir();//Rewind directory handle
    public function mkdir($path,$mode,$options);//Create a directory
    public function rmdir($path,$options);//Removes a directory
    // file
    public function rename($path_from,$path_to);//Renames a file or directory
    public function url_stat($path,$flags);//Retrieve information about a file
    public function unlink($path);//Delete a file
    // stream pointer
    public function stream_open($path,$mode,$options,&$opened_path);//Opens file or URL
    public function stream_set_option($option,$arg1,$arg2);//Change stream options
    public function stream_eof();//Tests for end-of-file on a file pointer
    public function stream_lock();//Advisory file locking
    public function stream_seek($offset,$whence=SEEK_SET);//Seeks to specific location in a stream
    public function stream_tell();//Retrieve the current position of a stream
    public function stream_stat();//Retrieve information about a file resource
    public function stream_read($count);//Read from stream
    public function stream_metadata($path,$option,$value);//Change stream metadata
    public function stream_write($data);//Write to stream
    public function stream_truncate($new_size);//Truncate stream
    public function stream_flush();//Flushes the output
    public function stream_close();//Close a resource
    public function stream_cast($cast_as);//Retrieve the underlaying resource

}