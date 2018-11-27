<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 18:11
 */

namespace LanguageStatement\DesignModel\DesignMethod\TransferObject;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$students=new StudentBO();

foreach($students->getAllStudent() as $student){
    echo "print Student : ".$student->getName()."\n";
}

$student=$students->getStudent(1);
$student->setName('Michael');
$students->updateStudent($student);