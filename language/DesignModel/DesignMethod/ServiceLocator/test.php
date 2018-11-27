<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$loader=new ServiceLocator();
$service=$loader->getService('service1');
$service->execute();
$service=$loader->getService('service2');
$service->execute();
$service=$loader->getService('service1');
$service->execute();
$service=$loader->getService('service2');
$service->execute();