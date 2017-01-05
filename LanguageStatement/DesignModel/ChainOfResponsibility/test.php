<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\ChainOfResponsibility;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$chain=new PackBottle();
$chain->next(new PackBox());

$chain->pack("water milk");
$chain->pack("bread apple");
$chain->pack("bread chicken");
$chain->pack("water coffee");