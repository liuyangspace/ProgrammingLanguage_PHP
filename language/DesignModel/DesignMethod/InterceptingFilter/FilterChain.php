<?php
/**
 * 过滤器链
 */

namespace LanguageStatement\DesignModel\DesignMethod\InterceptingFilter;


class FilterChain
{
    protected $filters=[];
    protected $target;

    public function addFilter(Filter $filter)
    {
        $this->filters[]=$filter;
    }

    public function setTarget(Target $target)
    {
        $this->target=$target;
    }

    public function execute($request)
    {
        foreach($this->filters as $filter){
            $filter->execute($request);
        }
        $this->target->execute($request);
    }
}