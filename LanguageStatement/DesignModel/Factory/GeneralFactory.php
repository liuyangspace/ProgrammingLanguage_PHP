<?php
/**
 * 通过 对象或类全名获取对象
 */

namespace LanguageStatement\DesignModel\Factory;


class GeneralFactory implements FactoryInterface
{

    //通过对象或string获取对象
    public static function produce($class)
    {
        if(is_object($class)){
            $class=get_class($class);
            return new $class();
        }elseif(is_string($class)){
            if(class_exists($class)){
                return new $class();
            }else{
                throw new \Exception("Undefined class:".$class);
            }
        }else{
            throw new \Exception($class." is not a object or string!");
        }
    }
}