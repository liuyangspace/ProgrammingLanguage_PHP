<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 16:31
 */

namespace LanguageStatement\DesignModel\Adapter;


class Image extends Adapter
{
    public function play($param)
    {
        echo "Play Image:$param\n";
        parent::play($param);

    }

    public function look($param)
    {
        echo "  $param:can look!\n";
    }
}