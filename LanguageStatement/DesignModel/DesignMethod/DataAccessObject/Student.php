<?php
/**
 * 数值对象
 */

namespace LanguageStatement\DesignModel\DesignMethod\DataAccessObject;


class Student
{
    protected $name;
    protected $old;

    public function __construct($name,$old)
    {
        $this->name=$name;
        $this->old=$old;
    }

    public function setName($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOld($old)
    {
        $this->old=$old;
    }

    public function getOld()
    {
        return $this->old;
    }
}