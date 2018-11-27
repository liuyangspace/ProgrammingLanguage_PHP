<?php
/**
 * 观察者 接口
 */

namespace LanguageStatement\DesignModel\Observer;


interface Observer
{
    public function getMessage($message);
}