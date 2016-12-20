<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/9
 * Time: 11:20
 */
namespace LanguageStatement;
use LanguageStatement\DataType\ArrayClass;
use LanguageStatement\DataType\FunctionClass;
use LanguageStatement\DataType\Graph;
use LanguageStatement\DataType\ListClass;
use LanguageStatement\DataType\Set;
use LanguageStatement\DataType\Tree;
use LanguageStatement\DataType\Stack;
use LanguageStatement\LanguageExtension\Reflection\Reflection;

require_once 'DataType.php';
require_once 'DataType/Boolean.php';
require_once 'DataType/Number.php';
require_once 'DataType/StringClass.php';
require_once 'DataType/ArrayClass.php';
require_once 'DataType/FunctionClass.php';
require_once 'DataType/ListClass.php';
require_once 'DataType/Stack.php';
require_once 'DataType/Set.php';
require_once 'DataType/Tree.php';
require_once 'DataType/Graph.php';
require_once 'LanguageExtension/Reflection/Reflection.php';

//$a=123;
//$a = DataType::is_inta($a);
//var_dump($a);
$a=new DataType();//var_dump(mb_check_encoding('的多字节字符串支持','UTF-16'));
//var_dump(\LanguageStatement\DataType\ArrayClass::range(1,20));

//\Reflection::export(new \ReflectionClass('Exception'));
//$a=new Reflection(123);$a->export();
//$a=new \ReflectionClass('Exception');$a->export();

$a=new Stack([1,2,3]);
//echo $a->pop();var_dump($a);
//echo $a->pop();var_dump($a);
//echo $a->pop();var_dump($a);
//echo $a->pop();var_dump($a);
// $a->push(3);var_dump($a);
// $a->push(2);var_dump($a);
// $a->push(1);var_dump($a);
// $a->push(1);var_dump($a);
//unset($a);//var_dump($a);
//echo empty($a);
//var_dump($a);
//echo $a[0];var_dump($a);
//echo $a[0];var_dump($a);
//echo $a[0];var_dump($a);
//$a[0]=3;var_dump($a);
//$a[0]=2;var_dump($a);
//$a[0]=1;var_dump($a);
//$a[0]=3;var_dump($a);
//$a=['a'=>1];var_dump($a['b']);
//$a=Set::diff([1,2,3,4],['3',4,5,6],3,true);var_dump($a);
//$a=new Tree([1=>[2,3],'3'=>[7,8]]);print_r($a);
//$a=new ListClass([1,2,3]);var_dump($a);
$a=new Graph([1=>[5,6],2,3]);var_dump($a);