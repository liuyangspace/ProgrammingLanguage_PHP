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
error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

//ob_implicit_flush();
$count=10;
while($count){
    sleep(1);
    echo "$count : out \n";
    $count--;
}