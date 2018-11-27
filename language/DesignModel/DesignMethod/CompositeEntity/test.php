<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\DesignMethod\CompositeEntity;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

class test
{
    public static function main()
    {
        $client=new Client();
        $client->setData(1,2);
        $client->printData();
        $client->setData('a','b');
        $client->printData();
    }
}
test::main();