<?php
/**
 *  桥接器
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