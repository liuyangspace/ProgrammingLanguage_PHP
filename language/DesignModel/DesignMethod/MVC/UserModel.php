<?php
/**
 * 模型层
 */

namespace LanguageStatement\DesignModel\DesignMethod\MVC;


class UserModel
{
    protected $name;

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name=$name;
    }
}