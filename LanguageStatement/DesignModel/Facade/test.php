<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Facade;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$facade=new Facade();
$facade->start();
$facade->end();
