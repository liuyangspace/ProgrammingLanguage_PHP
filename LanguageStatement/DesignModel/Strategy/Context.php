<?php
/**
 * 策略
 */

namespace LanguageStatement\DesignModel\Strategy;


class Context
{
    protected $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy=$strategy;
    }

    public function calculate($left, $right)
    {
        echo $this->strategy->action($left, $right)."\n";
    }
}