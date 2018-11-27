<?php
/**
 * 材料1
 */

namespace LanguageStatement\DesignModel\Builder;


class MaterialExample1  implements MaterialInterface
{
    public $name="metal";

    public function getCost()
    {
        echo "metal\n";
        return 5;
    }
}