<?php
/**
 * 被适配 类 接口
 */

namespace LanguageStatement\DesignModel\Adapter;


interface MediaInterface
{
    public function play($param);

    public function look($param);

    public function listen($param);
}