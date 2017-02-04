<?php
/**
 * Zip 用例
 */

namespace LanguageStatement\UtilComponent\Compress\test;
require_once __DIR__.'/../Zip.php';

$zip=zip_open('test.zip');
while($zipEntry=zip_read($zip)){
    echo zip_entry_name($zipEntry)
        .":[" .zip_entry_filesize($zipEntry)
        .'/'.zip_entry_compressedsize($zipEntry)
        .':'.zip_entry_compressionmethod($zipEntry)."]\n";
    while($string=zip_entry_read($zipEntry)){
        echo " $string";
    }
    echo "\n";
}
zip_close($zip);