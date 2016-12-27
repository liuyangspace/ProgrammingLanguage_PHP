<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/26
 * Time: 17:42
 */

namespace LanguageStatement\DesignModel\Decorator;


class ShapeRed extends ShapeColor
{
    public function draw()
    {

        $this->shape->draw();
        $this->setColor();
        echo ',Color:'.$this->color;
    }

    public function setColor(){
        $this->color='red';
    }
}