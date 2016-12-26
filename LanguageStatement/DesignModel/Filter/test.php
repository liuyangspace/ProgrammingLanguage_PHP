<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Filter;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

//
$criteria=new Criteria();
//
$criteria->addPerson(new Person('female'));
$criteria->addPerson(new Person('male'));
//
var_dump($criteria->filter(new Filter()));