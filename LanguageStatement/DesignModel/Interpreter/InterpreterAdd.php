<?php
/**
 * 解释器 类
 */

namespace LanguageStatement\DesignModel\Interpreter;


class InterpreterAdd implements Interpreter
{

    public function interpreter(Context $context)
    {
        return $context->left+$context->right;
    }

}