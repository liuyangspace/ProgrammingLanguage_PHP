<?php
/**
 * 发送命令的类
 */

namespace LanguageStatement\DesignModel\Command;


class Invoke
{
    protected $command;

    public function __construct(CommandInterface $cmd)
    {
        $this->command=$cmd;
    }

    public function run()
    {
        $this->command->execute();
    }

}