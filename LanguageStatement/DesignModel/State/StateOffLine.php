<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 11:23
 */

namespace LanguageStatement\DesignModel\State;


class StateOffline implements State
{

    public function aboutMessage($message)
    {
        echo "offline now\n";
    }

}