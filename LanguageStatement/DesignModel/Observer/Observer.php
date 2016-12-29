<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/29
 * Time: 22:17
 */

namespace LanguageStatement\DesignModel\Observer;


interface Observer
{
    public function getMessage($message);
}