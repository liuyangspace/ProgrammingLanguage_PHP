<?php
/**
 * 被适配 类
 */

namespace LanguageStatement\DesignModel\Adapter;


class Video extends Adapter
{

    public function play($param)
    {

        echo "Play Video:$param\n";
        parent::play($param);
    }

    public function look($param)
    {
        echo "  $param:can look!\n";
    }

    public function listen($param)
    {
        echo "  $param:can listen!\n";
    }
}