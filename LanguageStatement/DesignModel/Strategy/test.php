<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Strategy;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$context=new Context(new StrategyAdd());
$context->calculate(1,2);
$context=new Context(new StrategySub());
$context->calculate(1,2);
