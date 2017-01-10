<?php
include(__DIR__.'/LanguageStatement/LanguageStatement.php');
include(__DIR__.'/LanguageStatement/UtilComponent/DataTypeUtil/StringClass.php');
include(__DIR__.'/LanguageStatement/UtilComponent/DataTypeUtil/ArrayClass.php');

//$command=`whoami`;

//$a=mb_list_encodings();
//$a=mb_internal_encoding();
//$a=mb_detect_encoding('��ʵ��ʵ��ʦ', mb_list_encodings());
//$a='对方水电费';
//var_dump($a);
//$a=\LanguageStatement\UtilComponent\DataTypeUtil\StringClass::convertEncoding('对方水电费','GBK');
//$a=mb_convert_encoding('对方水电费','GB2312','UTF-8');
//$a=mb_detect_encoding('�?�?�??�??��?�令�?�?�??��?��?�???�?�??',mb_list_encodings());
//$a=[1,2,'a'=>3,4=>'b'];
//$a=\LanguageStatement\UtilComponent\DataTypeUtil\ArrayClass::arrayToJson($a);
//var_dump($a);
$a = "new string";
$c = $b = $a;
//xdebug_debug_zval( 'a' );
//unset( $b, $c );
//xdebug_debug_zval( 'a' );
//var_dump(realpath('test.php'));
$a=['as','a'=>123,78];
//echo json_encode($a,JSON_PRETTY_PRINT);
//spl_autoload_register();
//var_dump(spl_classes());
$stream=fopen('notes.txt','r+');
stream_set_read_buffer($stream,1024);
var_dump(fread($stream,1024));
var_dump(fwrite($stream,' streams '));
fclose($stream);
var_dump(stream_context_get_default());
