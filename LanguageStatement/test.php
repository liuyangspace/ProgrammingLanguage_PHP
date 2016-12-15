<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/9
 * Time: 11:20
 */
namespace LanguageStatement;
require_once 'DataType.php';
require_once 'DataType/Boolean.php';
require_once 'DataType/Number.php';
require_once 'DataType/StringClass.php';

//$a=123;
//$a = DataType::is_inta($a);
//var_dump($a);
$a=new DataType();
var_dump(\LanguageStatement\DataType\StringClass::get_html_translation_table());