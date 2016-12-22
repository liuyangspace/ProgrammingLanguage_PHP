<?php
/**
 * reference:http://www.runoob.com/design-pattern/factory-pattern.html
 */

namespace LanguageStatement\DesignModel\Singleton;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$a=Singleton::getInstance();
$a->setAsset(2);
var_dump($a->getAsset());
$b=Singleton::getInstance();
var_dump($b->getAsset());
$a->setAsset(3);
var_dump($a->getAsset());