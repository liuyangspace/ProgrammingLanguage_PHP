<?php
/**
 * 命令类
 */

namespace LanguageStatement\DesignModel\Command;


class Command implements CommandInterface
{
    protected $action;

    public function __construct(Action $action)
    {
        $this->action=$action;
    }

    public function execute()
    {
        $this->action->action();
    }

}