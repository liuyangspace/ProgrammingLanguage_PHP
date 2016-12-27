<?php
/**
 * Composite Pattern
 */

namespace LanguageStatement\DesignModel\Composite;


class Composite
{
    protected $name;
    protected $composites=[];

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function addComposite(Composite $composite){
        $this->composites[]=$composite;
    }
}