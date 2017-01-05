<?php
/**
 * 过滤管理器
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;


class FilterManager
{
    protected $filterChain;

    public function __construct(Target $target)
    {
        $this->filterChain=new FilterChain();
        $this->filterChain->setTarget($target);
    }

    public function addFilter(Filter $filter)
    {
        $this->filterChain->addFilter($filter);
    }

    public function filterRequest($request)
    {
        $this->filterChain->execute($request);
    }
}