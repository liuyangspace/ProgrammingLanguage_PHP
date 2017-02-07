<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\Curl;

require_once 'CurlPlus.php';

$url='http://h5.m.taobao.com/cncare2/pccncare.html?companyCode=STO的发生&from=stoweb#as';
$url='http://127.0.0.1:9000/test.php?a=1&b=2';

var_dump(CurlPlus::httpPost($url,['c'=>3,'d'=>4],[['filename'=>'Curl.php','mimetype'=>'text/php','postname'=>'CurlTest.php']]));
