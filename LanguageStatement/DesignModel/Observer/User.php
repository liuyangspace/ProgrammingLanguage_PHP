<?php
/**
 * 接受观察者
 */

namespace LanguageStatement\DesignModel\Observer;


class User
{
    protected $name;
    protected $observers=[];

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function sendMessage($message)
    {
        foreach($this->observers as $observer){
            $observer->getMessage($message);
        }
    }

    public function addObserver(Observer $observer)
    {
        return $this->observers[]=$observer;
    }

}