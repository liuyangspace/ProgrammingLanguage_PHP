<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 10:27
 */

namespace LanguageStatement\DesignModel\DesignMethod\BusinessDelegate;


class BusinessLookUp
{
    public function getBusinessService($type)
    {
        if($type=='EJB'){
            return new EJBService();
        }else{
            return new JMSService();
        }
    }
}