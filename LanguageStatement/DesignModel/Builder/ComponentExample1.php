<?php
/**
 * 零件1
 */

namespace LanguageStatement\DesignModel\Builder;


class ComponentExample1 implements ComponentInterface
{
    public $name="";

    protected $cost=0;

    public function __construct()
    {
        $this->produce([new MaterialExample1(),new MaterialExample1(),new MaterialExample2(),]);
    }

    public function produce(Array $materials)
    {
        foreach($materials as $material){
            if($material instanceof MaterialInterface){
                $this->cost+=$material->getCost();
            }
        }
    }

    public function getCost()
    {
        echo "ComponentExample1\n";
        return $this->cost;
    }
}