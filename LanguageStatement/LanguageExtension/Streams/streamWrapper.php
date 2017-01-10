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

    public function dir_opendir($path,$options);//Open directory handle
    public function dir_closedir();//Close directory handle
    public function dir_readdir();//Read entry from directory handle
    public function dir_rewinddir();//Rewind directory handle
    public function mkdir($path,$mode,$options);//Create a directory
    public function rmdir($path,$options);//Removes a directory

    public function rename($path_from,$path_to);//Renames a file or directory
    public function url_stat($path,$flags);//Retrieve information about a file
    public function unlink($path);//Delete a file

    public function stream_open($path,$mode,$options,&$opened_path);//Opens file or URL
    public function stream_read($count);//Read from stream

}