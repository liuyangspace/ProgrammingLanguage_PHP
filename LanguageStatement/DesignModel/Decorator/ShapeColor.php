<?php
/**
 * 形状 类
 */

namespace LanguageStatement\DesignModel\Decorator;


abstract class ShapeColor implements ShapeInterface
{
    protected $shape;

    protected $color;

    public function __construct(ShapeInterface $shape)
    {
        $this->shape=$shape;
    }

    public function draw()
    {
        $this->shape->draw();
    }

    abstract public function setColor();

}