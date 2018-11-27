<?php
/**
 * 请求处理程序
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;


class Target
{
    public function execute($request)
    {
        echo "Executing request: $request\n";
    }
}