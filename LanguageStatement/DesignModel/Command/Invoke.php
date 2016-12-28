<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 15:26
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