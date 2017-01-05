<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 9:38
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