<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Memento;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$user=new User('name1');
$manager=new UserManager($user);
$user->setName('name2');var_dump($user->getName());
$user->setName('name3');var_dump($user->getName());
$manager->backUser();var_dump($user->getName());
$manager->backUser();var_dump($user->getName());
