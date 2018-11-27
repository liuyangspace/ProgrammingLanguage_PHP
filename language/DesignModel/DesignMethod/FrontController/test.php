<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\DesignMethod\FrontController;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$front=new FrontController();
$front->dispatchRequest('student');
$front->dispatchRequest('home');