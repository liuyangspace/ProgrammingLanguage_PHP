<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 22:51
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