<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 10:37
 */

namespace LanguageStatement\DesignModel\DesignMethod\BusinessDelegate;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$businessDelegate=new BusinessDelegate();
$businessDelegate->setServiceType('EJB');
$client=new Client($businessDelegate);
$client->doTask();
$businessDelegate->setServiceType('JMS');
$client->doTask();
