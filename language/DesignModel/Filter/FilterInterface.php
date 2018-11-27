<?php
/**
 * 过滤
 */

namespace LanguageStatement\DesignModel\Filter;


interface FilterInterface
{

    public function meetCriteria(PersonInterface $param);

}