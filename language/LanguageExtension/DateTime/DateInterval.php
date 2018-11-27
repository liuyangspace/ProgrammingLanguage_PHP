<?php
/**
 * 时间段,时间间隔
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