<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 14:59
 */

namespace LanguageStatement\DesignModel\Prototype;


class Prototype
{
    public  $object;//clone:当对象被复制后，所有的引用属性 仍然会是一个指向原来的变量的引用。

    public function __construct()
    {
        $this->object=new Object();
    }

    public function cloneObject(){
        return clone $this;
    }

    public function __clone()//
    {
        // 强制复制一份this->object， 否则仍然指向同一个对象
        $this->object=clone $this->object;
    }
}

class Object
{
    public $number=0;
}