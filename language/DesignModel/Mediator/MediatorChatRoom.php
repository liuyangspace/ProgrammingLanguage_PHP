<?php
/**
 * 中介者
 */

namespace LanguageStatement\DesignModel\Mediator;

class MediatorChatRoom implements Mediator
{
    protected $chats=[];

    public function relationAction($param)
    {
        $this->chats[]=$param;
    }

    public function showChat()
    {
        foreach($this->chats as $chat){
            echo $chat."\n";
        }
    }
}