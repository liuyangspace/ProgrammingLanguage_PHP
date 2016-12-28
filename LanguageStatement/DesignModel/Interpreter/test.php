<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 16:49
 */

namespace LanguageStatement\DesignModel\Interpreter;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});
//5+8-3
echo (new InterpreterSub())->interpreter(
    new Context(
        (new InterpreterAdd())->interpreter(new Context(5,8)),
        3
    )
);
