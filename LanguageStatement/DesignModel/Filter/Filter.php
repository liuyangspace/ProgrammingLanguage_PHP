<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Filter;


class Filter implements FilterInterface
{
    public function meetCriteria(PersonInterface $param)
    {
        if($param->getGender()=='male'){
            return true;
        }else{
            return false;
        }
    }

}