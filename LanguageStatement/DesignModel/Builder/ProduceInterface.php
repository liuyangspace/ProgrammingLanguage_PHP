<?php
/**
 * 产品
 */

namespace LanguageStatement\DesignModel\Builder;


interface ProduceInterface
{

    //需要的零件（相对灵活 任意调节）
    public function addComponent(ComponentInterface $component);

    //产品成本
    public function getCost();
}