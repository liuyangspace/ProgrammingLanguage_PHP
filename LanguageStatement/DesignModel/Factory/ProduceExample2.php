<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 10:50
 */

namespace LanguageStatement\DesignModel\Factory;


class ProduceExample2 implements ProduceInterface
{

    public function consume($param)
    {
        echo __CLASS__."->".__FUNCTION__."($param)\n";
    }
}