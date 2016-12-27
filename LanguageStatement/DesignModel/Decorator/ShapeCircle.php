<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/26
 * Time: 17:34
 */

namespace LanguageStatement\DesignModel\Decorator;


class ShapeCircle implements ShapeInterface
{
    public function draw()
    {
        echo 'shape:circle';
    }
}