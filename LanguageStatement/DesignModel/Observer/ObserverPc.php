<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 22:42
 */

namespace LanguageStatement\DesignModel\Observer;


class ObserverPc implements Observer
{
    protected $user;

    public function __construct(User $user)
    {
        $user->addObserver($this);
        $this->user=$user;
    }

    public function getMessage($message)
    {
        echo "Pc get:".$message."\n";
    }

}