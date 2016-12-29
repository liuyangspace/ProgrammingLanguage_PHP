<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 22:50
 */

namespace LanguageStatement\DesignModel\Observer;


class ObserverPhone implements Observer
{
    protected $user;

    public function __construct(User $user)
    {
        $user->addObserver($this);
        $this->user=$user;
    }

    public function getMessage($message)
    {
        echo "Phone get:".$message;
    }
}