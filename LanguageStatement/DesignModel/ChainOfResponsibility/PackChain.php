<?php
/**
 * 处理链
 */

namespace LanguageStatement\DesignModel\ChainOfResponsibility;


abstract class PackChain implements PackInterface
{

    protected $next;

    public function next(PackInterface $pack)
    {
        $this->next=$pack;
    }

    abstract public function pack($param);

}