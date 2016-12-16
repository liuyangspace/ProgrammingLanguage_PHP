<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/9
 * Time: 11:20
 */
namespace LanguageStatement;
use LanguageStatement\DataType\FunctionClass;
use LanguageStatement\LanguageExtension\Reflection\Reflection;

require_once 'DataType.php';
require_once 'DataType/Boolean.php';
require_once 'DataType/Number.php';
require_once 'DataType/StringClass.php';
require_once 'DataType/ArrayClass.php';
require_once 'DataType/FunctionClass.php';
require_once 'LanguageExtension/Reflection/Reflection.php';

//$a=123;
//$a = DataType::is_inta($a);
//var_dump($a);
$a=new DataType();//var_dump(mb_check_encoding('的多字节字符串支持','UTF-16'));
//var_dump(\LanguageStatement\DataType\ArrayClass::range(1,20));

//\Reflection::export(new \ReflectionClass('Exception'));
$a=new Reflection(123);$a->export();
//$a=new \ReflectionClass('Exception');$a->export();
