<?php
/**
 * 备忘录
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