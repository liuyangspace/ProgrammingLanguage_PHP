<?php
/**
 * 策略
 */

namespace LanguageStatement\DesignModel\Strategy;


class StrategySub implements Strategy
{

    public function action($left, $right)
    {
        return $left-$right;
    }

}