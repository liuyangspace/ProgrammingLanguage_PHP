<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 16:28
 */

namespace LanguageStatement\DesignModel\Adapter;


interface MediaInterface
{
    public function play($param);

    public function look($param);

    public function listen($param);
}