<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Observer;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$user=new User('name1');
$pc=new ObserverPc($user);
$phone=new ObserverPhone($user);
$user->sendMessage('hello world');