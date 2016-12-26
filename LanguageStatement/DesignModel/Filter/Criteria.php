<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/26
 * Time: 16:39
 */

namespace LanguageStatement\DesignModel\Filter;


class Criteria
{
    protected $persons=[];

    public function addPerson(PersonInterface $person){
        $this->persons[]=$person;
    }

    public function filter(FilterInterface $filter){
        $result=[];
        foreach($this->persons as $person){
            if($filter->meetCriteria($person)){
                $result[]=$person;
            }
        }
        return $result;
    }

}