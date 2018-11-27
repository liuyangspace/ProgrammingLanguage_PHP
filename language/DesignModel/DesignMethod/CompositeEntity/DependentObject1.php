<?php
/**
 * 依赖对象
 */

namespace LanguageStatement\DesignModel\DesignMethod\CompositeEntity;


class DependentObject1
{
    protected $data;

    public function setData($data)
    {
        $this->data=$data;
    }

    public function getData()
    {
        return $this->data;
    }

}