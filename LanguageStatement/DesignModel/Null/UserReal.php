<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 12:04
 */

namespace LanguageStatement\DesignModel\Null;


class UserReal extends User
{

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        echo $this->name."\n";
    }

}