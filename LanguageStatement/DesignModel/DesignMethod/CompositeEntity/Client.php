<?php
/**
 * 客户端类
 */

namespace LanguageStatement\DesignModel\DesignMethod\CompositeEntity;


class Client
{
    protected $compositeEntity;

    public function __construct()
    {
        $this->compositeEntity=new CompositeEntity();
    }

    public function printData()
    {
        foreach($this->compositeEntity->getData() as $value){
            echo "$value\n";
        }
    }

    public function setData($data1,$data2)
    {
        $this->compositeEntity->setData($data1,$data2);
    }
}