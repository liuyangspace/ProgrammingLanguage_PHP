<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 10:26
 */

namespace LanguageStatement\DesignModel\DesignMethod\BusinessDelegate;


class JMSService implements BusinessService
{
    public function doProcessing()
    {
        echo "Processing task by invoking JMS Service\n";
    }
}