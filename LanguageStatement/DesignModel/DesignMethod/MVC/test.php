<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\DesignMethod\MVC;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$user=new UserModel('goodName');
$controller=new UserController();
$view=new View();
$view->showUser($controller,$user);
