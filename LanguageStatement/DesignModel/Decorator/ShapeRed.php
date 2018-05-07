<?php
/**
 * 形状 装饰类
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

    public function setColor()
    {
        $this->color='red';
    }
}