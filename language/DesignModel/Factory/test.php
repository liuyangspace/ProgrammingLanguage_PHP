<?php
/**
 * reference:http://www.runoob.com/design-pattern/factory-pattern.html
 */

namespace LanguageStatement\DesignModel\Factory;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$factory=new GeneralFactory();
$produce1=$factory->produce('LanguageStatement\DesignModel\Factory\ProduceExample1');
$produce1->consume(1);
$factory=new InitFactory();
$produce2=$factory->produce('LanguageStatement\DesignModel\Factory\ProduceExample2');
$produce2->consume(2);