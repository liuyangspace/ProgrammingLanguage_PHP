<?php
/**
 * Phar
 */
namespace LanguageStatement\LanguageExtension\Phar\test;
echo \Phar::apiVersion() ;
$phar = new \Phar(__DIR__.DIRECTORY_SEPARATOR.'test.phar');
$phar->addEmptyDir('testDir');