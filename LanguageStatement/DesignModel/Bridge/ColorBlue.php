<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 18:32
 */

namespace LanguageStatement\DesignModel\Bridge;


class ColorBlue implements ColorInterface
{

    public function draw()
    {
        echo " color is blue,\n";
    }
}