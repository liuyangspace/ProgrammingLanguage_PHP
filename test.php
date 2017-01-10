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
//$stream=fopen('notes.txt','r+');
//stream_set_read_buffer($stream,1024);
//var_dump(fread($stream,1024));
//var_dump(fwrite($stream,' streams '));
//fclose($stream);
//var_dump(stream_context_get_default());
$url = 'http://username:password@hostname/path?arg=value#anchor';
$url = 'http://www.baidu.com/path?arg=value#anchor';
//print_r(parse_url($url));
$pid = pcntl_fork();
//父进程和子进程都会执行下面代码
if ($pid == -1) {
    //错误处理：创建子进程失败时返回-1.
    die('could not fork');
} else if ($pid) {
    //父进程会得到子进程号，所以这里是父进程执行的逻辑
    pcntl_wait($status); //等待子进程中断，防止子进程成为僵尸进程。
} else {
    //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。
}

