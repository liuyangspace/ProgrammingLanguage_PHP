<?php
/**
 *  被桥接的类
 */

namespace LanguageStatement\DesignModel\Bridge;


class ColorBlue implements ColorInterface
{

    public function draw()
    {
        echo " color is blue,\n";
    }
}