<?php
/**
 * 策略
 */

namespace LanguageStatement\DesignModel\Strategy;


interface Strategy
{

    public function action($left,$right);

}