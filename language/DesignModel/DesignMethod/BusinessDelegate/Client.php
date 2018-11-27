<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 10:35
 */

namespace LanguageStatement\DesignModel\DesignMethod\BusinessDelegate;


class Client
{
    protected $businessService;

    public function __construct(BusinessDelegate $businessDelegate)
    {
        $this->businessService=$businessDelegate;
    }

    public function doTask()
    {
        $this->businessService->doTask();
    }
}