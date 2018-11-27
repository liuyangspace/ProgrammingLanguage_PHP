<?php
/**
 * 产品
 */

namespace LanguageStatement\DesignModel\Builder;


class ProduceExample1 implements ProduceInterface
{
    protected $cost=0;

    public function addComponent(ComponentInterface $component)
    {
        $this->cost+=$component->getCost();
    }

    public function getCost()
    {
        return $this->cost;
    }
}