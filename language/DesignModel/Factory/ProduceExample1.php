<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Factory;


class ProduceExample1 implements ProduceInterface
{

    public function consume($param)
    {
        echo __CLASS__."->".__FUNCTION__."($param)\n";
    }
}