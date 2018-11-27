<?php
/**
 * 模板重写
 */

namespace LanguageStatement\DesignModel\Template;


class Basketball extends Template
{
    public function start()
    {
        echo "basketball start\n";
    }

    public function end()
    {
        echo "basketball end\n";
    }
}