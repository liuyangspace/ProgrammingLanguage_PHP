<?php
/**
 * 上下文
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