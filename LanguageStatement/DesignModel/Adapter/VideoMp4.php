<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 16:30
 */

namespace LanguageStatement\DesignModel\Adapter;


class VideoMp4 implements VideoInterface
{

    public function play($param)
    {
        echo "Play MP4:$param\n";
    }
}