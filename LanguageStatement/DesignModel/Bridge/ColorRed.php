<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 18:05
 */

namespace LanguageStatement\DesignModel\Bridge;


class ColorRed  implements ColorInterface
{

    public function draw()
    {
        echo " color is red\n";
    }
}