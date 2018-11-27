<?php
/**
 * 过滤器接口
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;


interface Filter
{
    public function execute($request);
}