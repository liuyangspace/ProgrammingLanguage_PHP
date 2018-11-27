<?php
/**
 * 工厂构建器
 */

namespace LanguageStatement\DesignModel\Factory;


class FactoryBuilder
{
    //工厂容器
    protected $factoryContainer=[];

    //静态构建
    public static function build($param)
    {
        if($param=='general'){
            return new GeneralFactory();
        }
        if($param=='init'){
            return new InitFactory();
        }
        return false;
    }

    //动态构建
    public function addFactory($param){
        $factoryContainer[]=$param;
    }
    public function getFactory($param){
        return new $param();
    }

}