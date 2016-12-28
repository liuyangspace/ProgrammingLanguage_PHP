<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 15:48
 */

namespace LanguageStatement\DesignModel\Interpreter;


interface Interpreter
{

    public function interpreter(Context $context);

}