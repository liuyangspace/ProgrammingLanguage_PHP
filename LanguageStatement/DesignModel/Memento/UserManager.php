<?php
/**
 * 使用备忘录的类
 */

namespace LanguageStatement\DesignModel\Memento;


class UserManager
{

    protected $user;
    protected $memento=[];

    public function __construct(User $user)
    {
        $user->setManager($this);
        $this->user=$user;
    }

    public function saveUser(Memento $memento)
    {
        $this->memento[]=$memento;
    }

    public function backUser()
    {
        $this->user->backName(array_pop($this->memento)->getUserName());
    }

}