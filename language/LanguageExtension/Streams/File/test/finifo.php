
<?php
/**
 * 用例
 */
var_dump(extension_loaded('fileinfo'));

$file=new \finfo(FILEINFO_MIME_TYPE);
var_dump($file->file('Directory.php'));
var_dump($file->buffer('absdfg'));

$file->set_flags(FILEINFO_CONTINUE);
var_dump($file->file('Directory.php'));
