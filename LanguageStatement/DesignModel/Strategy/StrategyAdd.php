<?php
/**
 * 策略
 */

namespace LanguageStatement\DesignModel\Strategy;


class StrategyAdd implements Strategy
{

    public function action($left, $right)
    {
        return $left+$right;
    }

}