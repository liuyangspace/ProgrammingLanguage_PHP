<?php
/**
 * 迭代器 接口
 */

namespace LanguageStatement\DesignModel\Iterator;


interface Iterator
{
    public function current();
    public function next();
    public function valid();

}