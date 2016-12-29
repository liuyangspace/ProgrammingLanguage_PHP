<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 20:48
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