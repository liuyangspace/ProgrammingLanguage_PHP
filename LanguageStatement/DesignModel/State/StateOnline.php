<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 11:27
 */
namespace LanguageStatement\DesignModel\State;

class StateOnline implements State
{
    public function aboutMessage($message)
    {
        echo "message : $message\n";
    }
}