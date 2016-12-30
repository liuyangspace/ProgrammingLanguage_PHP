<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 15:24
 */

namespace LanguageStatement\DesignModel\Visitor;


class VisitorTwo implements Visitor
{

    public function visitor(Data $data)
    {
        echo 'VisitorTwo: '.$data->getDate()."\n";
    }

}