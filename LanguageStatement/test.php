<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/9
 * Time: 11:20
 */
namespace LanguageStatement;
use LanguageStatement\DataType\ArrayClass;
use LanguageStatement\DataType\Dictionary;
use LanguageStatement\DataType\FunctionClass;
use LanguageStatement\DataType\Graph;
use LanguageStatement\DataType\ListClass;
use LanguageStatement\DataType\Set;
use LanguageStatement\DataType\Tree;
use LanguageStatement\DataType\Stack;
use LanguageStatement\DataType\Map;
use LanguageStatement\DataType\Iterator;
use LanguageStatement\DesignModel\Factory\Factory;
use LanguageStatement\DesignModel\Singleton\Singleton;
use LanguageStatement\LanguageExtension\Reflection\Reflection;

spl_autoload_register(function($className){
    $filePath=__DIR__.'/../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});
//$a=123;
//$a = DataType::is_inta($a);
//var_dump($a);
//$a=new DataType();//var_dump(mb_check_encoding('的多字节字符串支持','UTF-16'));
//var_dump(\LanguageStatement\DataType\ArrayClass::range(1,20));

//\Reflection::export(new \ReflectionClass('Exception'));
//$a=new Reflection(123);$a->export();
//$a=new \ReflectionClass('Exception');$a->export();

//$a=new Stack([1,2,3]);
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
//$a=new Graph([1=>[5,6],2,3]);var_dump($a);
//$a=new Map([1,2,3],function($index){ return $index*2;});
//$a=new Dictionary([1=>[4,5],2,3]);$a[1][]=4;
//var_dump($a[1]);
//$a=new Dictionary();//var_dump($a);
//$a=array();
//$a['123']=1;var_dump($a);
//$a['ads']=new Dictionary();//;var_dump($a);
//$a['ads'][1]='sdad';//;var_dump($a);
//$a['ads'][2]=new Dictionary();//;var_dump($a);
//$a['ads'][2]['ss']=1;var_dump(get_class($a));
//var_dump($a[12]);
//$a=new Factory();$b=$a->produce('LanguageStatement\DataType\Tree');var_dump($b);
//$a=Singleton::getInstance();$a->setAsset(2);var_dump($a->getAsset());
//$b=Singleton::getInstance();var_dump($b->getAsset());$a->setAsset(3);var_dump($a->getAsset());
interface tmp
{
    public function get();
}
class tmpO implements tmp
{
    public function get($param)
    {
        echo $param;
    }
}

$a=new tmpO();$a->get(123);