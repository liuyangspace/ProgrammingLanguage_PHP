<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Proxy;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$cupProxy=new Proxy();

$cupProxy->start();
$cupProxy->start();
$cupProxy->end();
$cupProxy->end();