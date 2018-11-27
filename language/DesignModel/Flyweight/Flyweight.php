<?php
/**
 * 享元模式（Flyweight Pattern）
 */

namespace LanguageStatement\DesignModel\Flyweight;


class Flyweight
{
    protected $container=[];

    public function getMysqlConnect($ip)
    {
        $key='mysql_'.$ip;
        if(key_exists($key,$this->container)){

        }else{
            $this->container[$key]=new DatabaseMysql($ip);
        }

        //return $this->container[$key]->connect();

        //原型模式
        $newDatabase = clone $this->container[$key];
        echo "clone ";
        return $newDatabase->connect();
    }

}