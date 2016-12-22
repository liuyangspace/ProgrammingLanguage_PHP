<?php

namespace LanguageStatement\DesignModel\Factory;


interface FactoryInterface
{
    //  生成目标类
    public static function produce($class);

}