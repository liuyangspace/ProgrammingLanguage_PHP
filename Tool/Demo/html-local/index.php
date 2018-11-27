<?php
/**
 * html 本地化
 */

include_once "src/classloader.php";

$htmlLocal = new HtmlLocal();

$url = 'https://golang.org';
$url = 'http://www.runoob.com/go';
$url = 'https://golang.org';
//$url = 'https://c.runoob.com/';
CurlPlus::setProxy('http://127.0.0.1:52854'); // 设置代理
$htmlLocal
    ->grab($url)
    ->limit($url)
    ->setRecursionLength(16)
    //->exportLink("http://www.runoob.com/w3cnote")
    ->save('E:\tmp\html\data');
$htmlLocal->run();

