<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 21:46
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