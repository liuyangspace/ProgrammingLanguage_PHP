<?php
/**
 * 模板
 */

namespace LanguageStatement\DesignModel\Template;


abstract class Template
{

    abstract public function start();
    abstract public function end();

    public function play()
    {
        $this->start();
        $this->end();
    }

}