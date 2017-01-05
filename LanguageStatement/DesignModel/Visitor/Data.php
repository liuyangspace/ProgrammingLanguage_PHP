<?php
/**
 * 访问者
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