<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 16:55
 */

namespace LanguageStatement\DesignModel\Bridge;


class Bridge
{
    protected $color;

    public function setColor(ColorInterface $color)
    {
        $this->color=$color;
    }

    public function draw(){
        $this->color->draw();
    }
}