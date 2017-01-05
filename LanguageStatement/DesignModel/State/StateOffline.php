<?php
/**
 * 状态
 */
namespace LanguageStatement\DesignModel\State;

class StateOffline implements State
{
    public function aboutMessage($message)
    {
        echo "offline now\n";
    }
}