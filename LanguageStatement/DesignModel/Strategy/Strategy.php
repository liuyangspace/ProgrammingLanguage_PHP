<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 12:16
 */

namespace LanguageStatement\DesignModel\Strategy;


interface Strategy
{

    public function action($left,$right);

}