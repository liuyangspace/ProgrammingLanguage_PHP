<?php
/**
 * 组件，零件
 */

namespace LanguageStatement\DesignModel\Builder;


interface ComponentInterface
{

    //零件所需的材料（相对固定）
    public function produce(Array $materials);

    //零件的成本
    public function getCost();
}