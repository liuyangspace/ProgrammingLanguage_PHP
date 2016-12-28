<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 13:17
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