<?php

const CLASS_ROOT_PATH = __DIR__;

spl_autoload_register(function($className){
    $className=str_replace('\\',DIRECTORY_SEPARATOR,$className);
    $className=trim($className,DIRECTORY_SEPARATOR);
    $className=CLASS_ROOT_PATH.DIRECTORY_SEPARATOR.$className.'.php';
    include_once $className;
});
