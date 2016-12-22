<?php
/**
 * reference:http://www.runoob.com/design-pattern/factory-pattern.html
 */

namespace LanguageStatement\DesignModel\Prototype;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$a=new Prototype();
//$b=clone $a;
$b=$a->cloneObject();
var_dump($a->object->number);
var_dump($b->object->number);
$b->object->number=1;
var_dump($a->object->number);
var_dump($b->object->number);