<?php
/**
 * 访问者
 */

namespace LanguageStatement\DesignModel\Visitor;


interface Visitor
{

    public function visitor(Data $data);

}