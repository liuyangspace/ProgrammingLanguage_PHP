<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$filterManager=new FilterManager(new Target());
$filterManager->addFilter(new AuthenticationFilter());
$filterManager->addFilter(new DebugFilter());

$client=new Client();
$client->setFilterManager($filterManager);
$client->sendRequest('request1');
