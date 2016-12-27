<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/26
 * Time: 17:37
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