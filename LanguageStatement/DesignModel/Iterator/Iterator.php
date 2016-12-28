<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 22:34
 */

namespace LanguageStatement\DesignModel\Iterator;


interface Iterator
{
    public function current();
    public function next();
    public function valid();

}