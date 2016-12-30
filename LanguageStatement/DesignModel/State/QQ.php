<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 11:19
 */

namespace LanguageStatement\DesignModel\State;


class QQ
{

    protected $state;

    public function __construct(State $state)
    {
        $this->state=$state;
    }

    public function changeState(State $state)
    {
        $this->state=$state;
    }

    public function sendMessage($message)
    {
        $this->state->aboutMessage($message);
    }
}