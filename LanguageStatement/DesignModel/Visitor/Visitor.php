<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 15:15
 */

namespace LanguageStatement\DesignModel\Visitor;


interface Visitor
{

    public function visitor(Data $data);

}