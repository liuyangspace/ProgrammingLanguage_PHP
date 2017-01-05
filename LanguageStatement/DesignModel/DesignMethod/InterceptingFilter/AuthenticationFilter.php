<?php
/**
 * 实体过滤器
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;


class AuthenticationFilter implements Filter
{
    public function execute($request)
    {
        echo "Authenticating request : $request\n";
    }
}