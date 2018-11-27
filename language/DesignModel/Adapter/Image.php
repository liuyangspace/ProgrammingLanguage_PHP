<?php
/**
 * 被适配 类
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