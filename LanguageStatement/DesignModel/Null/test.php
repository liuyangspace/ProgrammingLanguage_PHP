<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 12:13
 */

namespace LanguageStatement\DesignModel\Null;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

UserFactory::getUser('name1')->getName();
UserFactory::getUser('name2')->getName();
UserFactory::getUser('name3')->getName();
UserFactory::getUser('name4')->getName();
