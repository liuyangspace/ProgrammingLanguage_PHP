<?php
/**
 * 缓存
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;


class Cache
{
    protected $services;

    public function __construct()
    {
        $this->services=[];
    }

    public function addService(Service $service)
    {
        $this->services[]=$service;
    }

    public function getService($serviceName)
    {
        foreach($this->services as $service){
            if($service->getName()==$serviceName){
                echo "Returning cached :$serviceName\n";
                return $service;
            }
        }
        return false;
    }
}