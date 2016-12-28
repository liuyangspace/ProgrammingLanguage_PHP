<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 15:28
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