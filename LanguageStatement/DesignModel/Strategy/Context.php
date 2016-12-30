<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 13:36
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