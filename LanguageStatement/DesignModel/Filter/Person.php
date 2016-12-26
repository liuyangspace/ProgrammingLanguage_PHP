<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Filter;


class Person implements PersonInterface
{
    protected $gender;

    public function __construct($param)
    {
        $this->gender=$param;
    }

    public function getGender()
    {
        return $this->gender;
    }
}