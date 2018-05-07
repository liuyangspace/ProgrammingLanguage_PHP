<?php
/**
 * 使用状态
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