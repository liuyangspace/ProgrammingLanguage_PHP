<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/20
 * Time: 17:34
 */

namespace LanguageStatement\LanguageExtension\DateTime;


class DateInterval extends \DateInterval
{
    public function __construct($interval_spec)
    {
        parent::__construct($interval_spec);
    }

    public static function createFromDateString($time){ return parent::createFromDateString($time); }//Sets up a DateInterval from the relative parts of the string
    public function format($format){ return parent::format($format); }//Formats the interval

}