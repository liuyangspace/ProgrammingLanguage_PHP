<?php
/**
 * 观察者 类
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