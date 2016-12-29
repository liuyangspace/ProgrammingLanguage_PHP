<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 22:39
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