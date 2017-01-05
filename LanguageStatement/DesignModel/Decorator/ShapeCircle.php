<?php
/**
 * 形状 类
 */

namespace LanguageStatement\DesignModel\Decorator;


class ShapeCircle implements ShapeInterface
{
    public function draw()
    {
        echo 'shape:circle';
    }
}