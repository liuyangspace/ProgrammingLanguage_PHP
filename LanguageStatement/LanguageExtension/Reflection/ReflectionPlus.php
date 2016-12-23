<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/16
 * Time: 16:14
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionPlus extends \Reflection
{
    public static $reflector = null;

    /*
     *
     */
    public function __construct($obj)
    {
        if( is_object($obj) || is_string($obj) ){
            $reflectionClass=new \ReflectionClass($obj);
            self::$reflector=$reflectionClass;
        }else{
            throw new \Exception($obj.' is not a string,class or object !');
        }
    }

    /*
     *  打印类或对象的信息
     */
    public static function export(\Reflector $reflector = null,$return = false)
    {
        if($reflector===null){
            $reflector=self::$reflector;
        }
        parent::export($reflector,$return);
    }

}