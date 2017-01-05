<?php
/**
 * 前端控制器 入口控制
 */

namespace LanguageStatement\DesignModel\DesignMethod\FrontController;


class FrontController
{
    protected $dispatcher;

    public function __construct()
    {
        $this->dispatcher=new Dispatcher();
    }

    protected function isAuthenticUser()
    {
        echo "User is authenticated successfully.\n";
    }

    public function dispatchRequest($request)
    {
        $this->isAuthenticUser();
        $this->dispatcher->dispatch($request);
    }
}