<?php
/**
 * 调度器
 */

namespace LanguageStatement\DesignModel\DesignMethod\FrontController;


class Dispatcher
{
    protected $homeView;
    protected $studentView;

    public function __construct()
    {
        $this->homeView=new HomeView();
        $this->studentView=new StudentView();
    }

    public function dispatch($request)
    {
        if($request=='student'){
            $this->studentView->show();
        }else{
            $this->homeView->show();
        }
    }
}