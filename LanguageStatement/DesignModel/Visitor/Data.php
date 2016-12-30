<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 15:15
 */

namespace LanguageStatement\DesignModel\Visitor;


class Data
{
    protected $data='this is some date';

    public function accept(Visitor $visitor)
    {
        $visitor->visitor($this);
    }

    public function getDate()
    {
        return $this->data;
    }
}