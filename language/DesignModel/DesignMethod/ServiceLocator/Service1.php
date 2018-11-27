<?php
/**
 * 实体服务
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;


class Service1 implements Service
{
    public function getName()
    {
        return 'Service1';
    }

    public function execute()
    {
        echo "execute service1 \n";
    }
}