<?php
/**
 * 调用桥接器的类
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