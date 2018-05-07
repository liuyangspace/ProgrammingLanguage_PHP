<?php
/**
 * zend 扩展类
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionZendExtension extends \ReflectionZendExtension implements \Reflector
{
    //final private void __clone ( void )
    public function __construct($name){parent::__construct($name);}
    public function __toString(){parent::__toString();}
    public static function export($name, $return = null){parent::export($name, $return);}

    public function getName(){parent::getName();}//Gets name
    public function getAuthor(){parent::getAuthor();}//Gets author
    public function getCopyright(){parent::getCopyright();}//Gets copyright
    public function getVersion(){parent::getVersion();}//Gets version
    public function getURL(){parent::getURL();}//Gets URL

}