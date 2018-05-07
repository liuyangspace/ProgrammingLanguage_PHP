<?php
/**
 * 解释器 类
 */

namespace LanguageStatement\DesignModel\Interpreter;


class InterpreterSub implements Interpreter
{

    public function interpreter(Context $context)
    {
        return $context->left-$context->right;
    }

}