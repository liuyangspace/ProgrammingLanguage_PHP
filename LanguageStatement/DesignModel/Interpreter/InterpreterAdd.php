<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 22:05
 */

namespace LanguageStatement\DesignModel\Interpreter;


class InterpreterAdd implements Interpreter
{

    public function interpreter(Context $context)
    {
        return $context->left+$context->right;
    }

}