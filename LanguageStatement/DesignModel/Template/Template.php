<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 14:12
 */

namespace LanguageStatement\DesignModel\Template;


abstract class Template
{

    abstract public function start();
    abstract public function end();

    public function play()
    {
        $this->start();
        $this->end();
    }

}