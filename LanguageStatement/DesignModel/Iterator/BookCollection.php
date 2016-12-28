<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 22:38
 */

namespace LanguageStatement\DesignModel\Iterator;


class BookCollection
{
    protected $container=[];

    public function __construct(Array $arr)
    {
        $this->container=$arr;
    }

    public function getIterator()
    {
        return new BookIterator($this);
    }

    public function getBook($key)
    {
        if(isset($this->container[$key])){
            return $this->container[$key];
        }else{
            return null;
        }
    }

}