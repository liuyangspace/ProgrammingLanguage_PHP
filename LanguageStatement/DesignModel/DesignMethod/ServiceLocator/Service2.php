<?php
/**
 * 实体服务
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;


class Service2 implements Service
{
    public function getName()
    {
        return 'Service2';
    }

    public function execute()
    {
        echo "execute service2 \n";
    }
}