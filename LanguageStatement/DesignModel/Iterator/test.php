<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Iterator;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$bookCollection=new BookCollection(['book1','book2','book3']);
$iterator=$bookCollection->getIterator();
while($iterator->valid()){
    echo $iterator->current()."\n";
    $iterator->next();
}
