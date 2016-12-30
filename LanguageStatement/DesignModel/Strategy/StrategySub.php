<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 13:39
 */

namespace LanguageStatement\DesignModel\Strategy;


class StrategySub implements Strategy
{

    public function action($left, $right)
    {
        return $left-$right;
    }

}