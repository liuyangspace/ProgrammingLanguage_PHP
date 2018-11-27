<?php
/**
 * 状态
 */
namespace LanguageStatement\DesignModel\State;

class StateOnline implements State
{
    public function aboutMessage($message)
    {
        echo "message : $message\n";
    }
}