<?php
/**
 * 服务定位器
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;


class ServiceLocator
{
    protected static $cache;

    public static function getService($jndiName)
    {
        if(!self::$cache){
            self::$cache=new Cache();
        }
        $service=self::$cache->getService($jndiName);
        if($service != false){
            return $service;
        }

        $context = new InitialContext();
        $service1=$context->lookup($jndiName);
        self::$cache->addService($service1);
        return $service1;
    }
}