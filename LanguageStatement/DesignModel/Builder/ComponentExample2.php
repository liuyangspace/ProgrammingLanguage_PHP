<?php
/**
 * 零件2
 */

namespace LanguageStatement\DesignModel\Builder;


class ComponentExample2 implements ComponentInterface
{
    public $name="";

    protected $cost=0;

    public function __construct()
    {
        $this->produce([new MaterialExample1(),new MaterialExample2(),new MaterialExample2(),]);
    }

    public function produce(Array $materials)
    {
        foreach($materials as $material){
            if($material instanceof MaterialInterface){
                $this->cost+=$material->getCost()*2;
            }
        }
    }

    public function getCost()
    {
        echo "ComponentExample2\n";
        return $this->cost;
    }
}