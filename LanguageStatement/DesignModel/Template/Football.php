<?php
/**
 * 模板重写
 */

namespace LanguageStatement\DesignModel\Template;


class Football extends Template
{
    public function start()
    {
        echo "football start\n";
    }

    public function end()
    {
        echo "football end\n";
    }
}
