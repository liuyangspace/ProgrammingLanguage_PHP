<?php
/**
 * 解释器 接口
 */

namespace LanguageStatement\DesignModel\Interpreter;


interface Interpreter
{

    public function interpreter(Context $context);

}