<?php
/**
 * Zlib
 */

namespace LanguageStatement\UtilComponent\Compress;


class Zlib
{
    public static $config=[
        'zlib.output_compression',//Whether to transparently compress pages.
        'zlib.output_compression_level',//Compression level used for transparent output compression
        'zlib.output_handler',//You cannot specify additional output handlers if zlib.
    ];

    public static $constants=[
        'FORCE_GZIP',//
        'FORCE_DEFLATE',//
        // Available as of PHP 7.0.0.
        'ZLIB_ENCODING_RAW',//DEFLATE algorithm as per RFC 1951.
        'ZLIB_ENCODING_DEFLATE',//ZLIB compression algorithm as per RFC 1950.
        'ZLIB_ENCODING_GZIP',//GZIP algorithm as per RFC 1952.
        'ZLIB_FILTERED',//
        'ZLIB_HUFFMAN_ONLY',//
        'ZLIB_FIXED',//
        'ZLIB_RLE',//
        'ZLIB_DEFAULT_STRATEGY',//
        'ZLIB_BLOCK',//
        'ZLIB_NO_FLUSH',//
        'ZLIB_PARTIAL_FLUSH',//
        'ZLIB_SYNC_FLUSH',//
        'ZLIB_FULL_FLUSH',//
        'ZLIB_FINISH',//
    ];

    // inflate deflate
    public static function deflate_init($encoding,$options=[]){return deflate_init($encoding,$options);}//Initialize an incremental deflate context
    public static function deflate_add($context,$data,$flush_mode){return deflate_add($context,$data,$flush_mode);}//Incrementally deflate data
    public static function inflate_init($encoding,$options=[]){return inflate_init($encoding,$options);}//Initialize an incremental inflate context
    public static function inflate_add($context,$encoded_data,$flush_mode){return inflate_add($context,$encoded_data,$flush_mode);}//Incrementally inflate encoded data
    public static function gzdeflate($data,$level=-1,$encoding=ZLIB_ENCODING_RAW){return gzdeflate($data,$level,$encoding);}//Deflate a string
    public static function gzinflate($data,$length=0){return gzinflate($data,$length);}//Inflate a deflated string
    //
    public static function gzencode($data,$level=-1,$encoding_mode=FORCE_GZIP){return gzencode($data,$level,$encoding_mode);}//Create a gzip compressed string
    public static function gzdecode($data,$length){return gzdecode($data,$length);}//Decodes a gzip compressed string
    public static function zlib_decode($data,$max_decoded_len){return zlib_decode($data,$max_decoded_len);}//Uncompress any raw/gzip/zlib encoded data
    public static function zlib_encode($data,$encoding,$level=-1){return zlib_encode($data,$encoding,$level);}//Compress data with the specified encoding
    //
    public static function gzcompress($data,$level=-1,$encoding=ZLIB_ENCODING_DEFLATE){return gzcompress($data,$level,$encoding);}//Compress a string
    public static function gzuncompress($data,$length=0){return gzuncompress($data,$length);}// Uncompress a compressed string
    //
    public static function readgzfile($filename,$use_include_path=0){return readgzfile($filename,$use_include_path);}//Reads a file, decompresses it and writes it to standard output.
    // pointer
    public static function gzopen($filename,$mode,$use_include_path=0){return gzopen($filename,$mode,$use_include_path);}//Open gz-file

    public static function gzread($zp,$length){return gzread($zp,$length);}// Binary-safe gz-file read
    public static function gzgets($zp,$length){return gzgets($zp,$length);}//Get line from file pointer
    public static function gzgetss($zp,$length,$allowable_tags){return gzgetss($zp,$length,$allowable_tags);}//Get line from gz-file pointer and strip HTML tags
    public static function gzgetc($zp){return gzgetc($zp);}//Get character from gz-file pointer
    public static function gzpassthru($zp){return gzpassthru($zp);} //Output all remaining data on a gz-file pointer

    public static function gzputs($zp,$string,$length){return gzwrite($zp,$string,$length);}//别名 gzwrite()
    public static function gzwrite($zp,$string,$length){return gzwrite($zp,$string,$length);}//Binary-safe gz-file write

    public static function gzrewind($zp){return gzrewind($zp);}//Rewind the position of a gz-file pointer
    public static function gztell($zp){return gztell($zp);}//Tell gz-file pointer read/write position
    public static function gzeof($zp){return gzeof($zp);}//Test for EOF on a gz-file pointer
    public static function gzseek($zp,$offset,$whence=SEEK_SET){return gzseek($zp,$offset,$whence);}//Seek on a gz-file pointer

    public static function gzclose($zp){return gzclose($zp);}//Close an open gz-file pointer

    public static function gzfile($filename,$use_include_path=0){return gzfile($filename,$use_include_path);}//Read entire gz-file into an array
    public static function zlib_get_coding_type(){return zlib_get_coding_type();}//Returns the coding type used for output compression
}