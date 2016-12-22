<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 16:31
 */

namespace LanguageStatement\DesignModel\Adapter;


class VideoAvi implements VideoInterface
{
    public function play($param)
    {
        echo "Play AVI:$param\n";
    }
}