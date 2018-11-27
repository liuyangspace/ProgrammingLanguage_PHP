<?php
/**
 * 粗粒度对象
 */

namespace LanguageStatement\DesignModel\DesignMethod\CompositeEntity;


class CoarseGrainedObject
{
    protected $dependentObject1;
    protected $dependentObject2;

    public function __construct()
    {
        $this->dependentObject1=new DependentObject1();
        $this->dependentObject2=new DependentObject2();
    }

    public function setData($data1,$data2)
    {
        $this->dependentObject1->setData($data1);
        $this->dependentObject2->setData($data2);
    }

    public function getData()
    {
        return [$this->dependentObject1->getData(),$this->dependentObject2->getData()];
    }
}