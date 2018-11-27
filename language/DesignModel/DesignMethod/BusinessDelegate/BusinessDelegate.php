<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 10:30
 */

namespace LanguageStatement\DesignModel\DesignMethod\BusinessDelegate;


class BusinessDelegate
{
    protected $lookupService;
    protected $businessService;
    protected $serviceType;

    public function __construct()
    {
        $this->lookupService=new BusinessLookUp();
    }

    public function setServiceType($type)
    {
        $this->serviceType=$type;
    }

    public function doTask()
    {
        $this->businessService=$this->lookupService->getBusinessService($this->serviceType);
        $this->businessService->doProcessing();
    }
}