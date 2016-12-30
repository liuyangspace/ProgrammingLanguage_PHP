<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 12:10
 */

namespace LanguageStatement\DesignModel\Null;

class UserFactory
{
    protected static $name=['name1','name2',];

    public static function getUser($name)
    {
        if(in_array($name,self::$name)){
            return new UserReal($name);
        }else{
            return new UserNull();
        }
    }

}