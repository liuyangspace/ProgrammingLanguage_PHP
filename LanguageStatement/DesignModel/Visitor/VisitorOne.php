<?php
/**
 * 访问者1
 */

namespace LanguageStatement\DesignModel\Visitor;


class VisitorOne implements Visitor
{

    public function visitor(Data $data)
    {
        echo 'VisitorOne: '.$data->getDate()."\n";
    }

}