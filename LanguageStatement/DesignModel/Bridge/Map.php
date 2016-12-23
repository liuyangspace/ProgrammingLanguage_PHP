<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 17:11
 */

namespace LanguageStatement\DesignModel\Bridge;


class Map
{
    public function draw(ColorInterface $color){
        $bridge=new Bridge();
        $bridge->setColor($color);
        echo 'draw Circle:';
        $bridge->draw();
    }
}