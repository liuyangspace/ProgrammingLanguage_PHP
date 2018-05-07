<?php
/**
 * 服务接口
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;


interface Service
{
    public function getName();
    public function execute();
}