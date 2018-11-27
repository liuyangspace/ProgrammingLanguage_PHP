<?php
/**
 * 用户 接口
 */

namespace LanguageStatement\DesignModel\Null;


abstract class User
{
    protected $name;

    abstract public function getName();

}