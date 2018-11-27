<?php
/**
 * 创建 静态资源导入，动态统一配置的 对象
 */

namespace LanguageStatement\DesignModel\Factory;


class InitFactory implements FactoryInterface
{
    protected static $asset=null;

    //分配静态资源
    public static function init(){
        $configFIlePath='';
        self::$asset=json_decode($configFIlePath);
    }

    //分配动态资源
    public function setAsset($asset){
        self::$asset=$asset;
    }

    public static function produce($class)
    {
        return new $class(self::$asset);
    }
}