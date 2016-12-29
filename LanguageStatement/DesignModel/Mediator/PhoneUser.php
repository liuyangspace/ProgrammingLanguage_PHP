<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 20:47
 */

namespace LanguageStatement\DesignModel\Mediator;


class PhoneUser
{
    protected $name;
    protected $chatRome;

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function addChatRoom(MediatorChatRoom $chatRoom)
    {
        $this->chatRome=$chatRoom;
    }

    public function chat($message)
    {
        $this->chatRome->relationAction($this->name." ".date('H:i:s').' [on Phone]: '.$message);
    }
}