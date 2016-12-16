<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/9
 * Time: 11:20
 */
namespace LanguageStatement;
use LanguageStatement\DataType\FunctionClass;

require_once 'DataType.php';
require_once 'DataType/Boolean.php';
require_once 'DataType/Number.php';
require_once 'DataType/StringClass.php';
require_once 'DataType/ArrayClass.php';
require_once 'DataType/FunctionClass.php';

//$a=123;
//$a = DataType::is_inta($a);
//var_dump($a);
$a=new DataType();//var_dump(mb_check_encoding('的多字节字符串支持','UTF-16'));
//var_dump(\LanguageStatement\DataType\ArrayClass::range(1,20));

function ab(){
    echo FunctionClass::func_get_arg(0);
}

ab(123);