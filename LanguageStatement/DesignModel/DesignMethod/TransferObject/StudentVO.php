<?php
/**
 * 传输对象
 */

namespace LanguageStatement\DesignModel\DesignMethod\TransferObject;


class StudentVO
{
    protected $name;
    protected $rollNo;

    public function __construct($name,$rollNo)
    {
        $this->name = $name;
        $this->rollNo = $rollNo;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRollNo()
    {
        return $this->rollNo;
    }

    public function setRollNo($rollNo)
    {
        $this->rollNo = $rollNo;
    }
}