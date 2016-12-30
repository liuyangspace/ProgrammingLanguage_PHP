<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 15:25
 */

namespace LanguageStatement\DesignModel\Visitor;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$visitor1=new VisitorOne();
$visitor2=new VisitorTwo();
$data=new Data();
$data->accept($visitor1);
$data->accept($visitor2);