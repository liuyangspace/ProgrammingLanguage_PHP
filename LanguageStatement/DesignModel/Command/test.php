<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Command;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});
$cmd=new Command(new Action());
$invoke=new Invoke($cmd);
$invoke->run();