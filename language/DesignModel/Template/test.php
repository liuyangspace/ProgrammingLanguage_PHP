<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Template;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$basketball=new Basketball();
$basketball->play();
$football=new Football();
$football->play();