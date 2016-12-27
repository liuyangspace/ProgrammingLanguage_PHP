<?php
/**
 * Composite Pattern
 */

namespace LanguageStatement\DesignModel\Composite;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$person=new Composite('Person');
$person->addComposite(new Composite('LeftHand'));
$person->addComposite(new Composite('RightHand'));
var_dump($person);