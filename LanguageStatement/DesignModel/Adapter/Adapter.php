<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Adapter;


class Adapter implements MediaInterface
{

    public function play($param)
    {
        $this->look($param);
        $this->listen($param);
    }

    public function look($param)
    {
        echo "  $param:can't look!\n";
    }

    public function listen($param)
    {
        echo "  $param:can't listen!\n";
    }
}