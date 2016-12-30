<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 15:18
 */

namespace LanguageStatement\DesignModel\Visitor;


class VisitorOne implements Visitor
{

    public function visitor(Data $data)
    {
        echo 'VisitorOne: '.$data->getDate()."\n";
    }

}