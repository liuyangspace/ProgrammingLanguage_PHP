<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Decorator;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

//
$circle=new ShapeCircle();
$circle->draw();echo "\n";
//
$redCircle=new ShapeRed($circle);
$redCircle->draw();echo "\n";