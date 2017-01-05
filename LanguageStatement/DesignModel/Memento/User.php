<?php
/**
 * 记录的对象
 */

namespace LanguageStatement\DesignModel\Memento;


class User
{
    protected $name;
    protected $manager;

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function setName($name)
    {
        $this->manager->saveUser(new Memento($this));
        $this->name=$name;
    }

    public function backName($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setManager(UserManager $manager)
    {
        $this->manager=$manager;
    }
}