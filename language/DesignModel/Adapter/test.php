<?php
/**
 * 用例
 * reference:http://www.runoob.com/design-pattern/factory-pattern.html
 */

namespace LanguageStatement\DesignModel\Adapter;
use LanguageStatement\DesignModel\Adapter\Play;

spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$a=new Play();
$a->play('1.jpg');
$a->play('2.mp4');
$a->play('3.avi');
$a->play('4.wmv');