<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\Mediator;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

$pcUser=new PcUser('rose');
$phoneUser=new PhoneUser('jack');
$chatRoom=new MediatorChatRoom();

$pcUser->addChatRoom($chatRoom);
$phoneUser->addChatRoom($chatRoom);

$pcUser->chat('hello,how are you ?');
$phoneUser->chat('hi,i am fine,and you?');
$pcUser->chat('me too.');

$chatRoom->showChat();