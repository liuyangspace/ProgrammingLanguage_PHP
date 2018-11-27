<?php
/**
 * 被桥接的类
 */

namespace LanguageStatement\DesignModel\Bridge;


class ColorRed  implements ColorInterface
{

    public function draw()
    {
        echo " color is red\n";
    }
}