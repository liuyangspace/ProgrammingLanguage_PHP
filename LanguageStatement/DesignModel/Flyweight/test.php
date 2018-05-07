<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Flyweight;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$connect=new Flyweight();

$mysql=$connect->getMysqlConnect('123');
$mysql=$connect->getMysqlConnect('123');
$mysql=$connect->getMysqlConnect('1234');
$mysql=$connect->getMysqlConnect('12345');
$mysql=$connect->getMysqlConnect('123');

