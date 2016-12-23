<?php
/**
 * reference:http://www.runoob.com/design-pattern/factory-pattern.html
 */

namespace LanguageStatement\DesignModel\Adapter;
use LanguageStatement\DesignModel\Adapter\Play;
use LanguageStatement\DesignModel\Bridge\ColorBlue;
use LanguageStatement\DesignModel\Bridge\ColorRed;
use LanguageStatement\DesignModel\Bridge\Map;

spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$a=new Map();
$a->draw(new ColorRed());
$a->draw(new ColorBlue());
