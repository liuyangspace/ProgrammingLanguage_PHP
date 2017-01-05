<?php
/**
 * 实体用户
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