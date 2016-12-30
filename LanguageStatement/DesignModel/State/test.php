<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 11:30
 */

namespace LanguageStatement\DesignModel\State;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$online=new StateOnline();
$offline=new StateOffline();

$qq=new QQ($online);
$qq->sendMessage('hello world ');
$qq->changeState($offline);
$qq->sendMessage('hello world ');

