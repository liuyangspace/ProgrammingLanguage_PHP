<?php
/**
 * 中介者服务对象
 */

namespace LanguageStatement\DesignModel\Mediator;


class PcUser
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
        $this->chatRome->relationAction($this->name." ".date('H:i:s').' [on PC]: '.$message);
    }
}