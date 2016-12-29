<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 21:18
 */

namespace LanguageStatement\DesignModel\Memento;


class Memento
{
    protected $userName;

    public function __construct(User $user)
    {
        //$this->user=clone $user;
        $this->userName=$user->getName();
    }

    public function getUserName()
    {
        return $this->userName;
    }
}