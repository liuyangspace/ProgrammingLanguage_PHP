<?php
/**
 *
 */

namespace LanguageStatement\LanguageExtension\Streams\test;

class FileFilter extends \php_user_filter
{
    public function filter($in,$out,&$consumed,$closing)
    {
        while ($bucket = stream_bucket_make_writeable($in)) {
            //var_dump($bucket);
            $bucket->data = strtoupper($bucket->data);
            $consumed += $bucket->datalen;
            stream_bucket_append($out, $bucket);
        }
        return PSFS_PASS_ON;

    }
}
stream_filter_register("FileFilter", 'LanguageStatement\LanguageExtension\Streams\test\FileFilter');

$stream=fopen('test.txt','r+');
stream_filter_append($stream, "FileFilter");


fwrite($stream, "Line1\n");
fwrite($stream, "Word - 2\n");
fwrite($stream, "Easy As 123\n");

fclose($stream);

