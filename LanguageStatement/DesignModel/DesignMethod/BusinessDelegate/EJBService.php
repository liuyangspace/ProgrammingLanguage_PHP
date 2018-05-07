<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 10:25
 */

namespace LanguageStatement\DesignModel\DesignMethod\BusinessDelegate;


class EJBService implements BusinessService
{
    public function doProcessing()
    {
        echo "Processing task by invoking EJB Service\n";
    }
}