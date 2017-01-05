<?php
/**
 * 实体过滤器
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;


class DebugFilter implements Filter
{
    public function execute($request)
    {
        echo "Debug request : $request\n";
    }
}