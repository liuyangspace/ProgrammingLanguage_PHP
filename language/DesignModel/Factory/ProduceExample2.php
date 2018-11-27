<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Factory;


class ProduceExample2 implements ProduceInterface
{

    public function consume($param)
    {
        echo __CLASS__."->".__FUNCTION__."($param)\n";
    }
}