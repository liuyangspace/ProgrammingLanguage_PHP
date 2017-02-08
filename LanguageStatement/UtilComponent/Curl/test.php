<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\Curl;

require_once 'CurlPlus.php';

$url='http://h5.m.taobao.com/cncare2/pccncare.html?companyCode=STO的发生&from=stoweb#as';
//$url='http://127.0.0.1:9000/test.php?a=1&b=2';
//$url='https://segmentfault.com/q/1010000002784604';
$url='https://kyfw.12306.cn/otn/';
$files=[['filename'=>'Curl.php','mimetype'=>'text/php','postname'=>'CurlTest.php']];
$files=['Curl.php','CURLFile.php'];
//var_dump(CurlPlus::httpPost($url,['c'=>3,'d'=>4],$files));
var_dump(CurlPlus::httpPost($url));
