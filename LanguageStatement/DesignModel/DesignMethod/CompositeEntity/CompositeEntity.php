<?php
/**
 * 组合实体
 */

namespace LanguageStatement\DesignModel\DesignMethod\CompositeEntity;


class CompositeEntity
{
    protected $coarseGrainedObject;

    public function __construct()
    {
        $this->coarseGrainedObject=new CoarseGrainedObject();
    }

    public function setData($data1,$data2)
    {
        $this->coarseGrainedObject->setData($data1,$data2);
    }

    public function getData()
    {
        return $this->coarseGrainedObject->getData();
    }
}