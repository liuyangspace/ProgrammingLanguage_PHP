<?php
/**
 * reference:http://www.runoob.com/design-pattern/factory-pattern.html
 */

namespace LanguageStatement\DesignModel\Singleton;
use LanguageStatement\DesignModel\Builder\Builder;

spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

echo $builder=Builder::build('产品1')->getCost();
echo $builder=Builder::build('产品2')->getCost();