<?php
/**
 * 用户工厂
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