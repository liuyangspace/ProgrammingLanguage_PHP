<?php
/**
 * 访问者2
 */

namespace LanguageStatement\DesignModel\Visitor;


class VisitorTwo implements Visitor
{

    public function visitor(Data $data)
    {
        echo 'VisitorTwo: '.$data->getDate()."\n";
    }

}