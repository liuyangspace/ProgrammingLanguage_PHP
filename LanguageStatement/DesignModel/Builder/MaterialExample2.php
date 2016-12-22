<?php
/**
 * 材料2
 */

namespace LanguageStatement\DesignModel\Builder;


class MaterialExample2 implements MaterialInterface
{
    public $name="wood";

    public function getCost()
    {
        return 2;
    }
}