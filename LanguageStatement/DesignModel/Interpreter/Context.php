<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 22:01
 */

namespace LanguageStatement\DesignModel\Interpreter;


class Context
{
    public $left;
    public $right;

    public function __construct($left,$right)
    {
        $this->left=$left;
        $this->right=$right;
    }
}