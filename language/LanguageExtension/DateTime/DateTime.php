<?php
/**
 * 时间点
 */

namespace LanguageStatement\LanguageExtension\DateTime;


class DateTime extends \DateTime
{

    public function __construct($time, DateTimeZone $timezone)
    {
        parent::__construct($time, $timezone);
    }

    public function add(DateInterval $interval){ parent::add($interval); }//将时间点移动一段时间
    public function sub(DateInterval $interval){parent::sub($interval);}//Subtracts an amount of days, months, years, hours, minutes and seconds from a DateTime object
    public function modify($modify){parent::modify($modify);}//Alters the timestamp

    public function setTime($hour, $minute, $second = 0){parent::setTime($hour, $minute, $second);}//Sets the time
    public function setTimestamp($unixtimestamp){parent::setTimestamp($unixtimestamp);}//Sets the date and time based on an Unix timestamp
    public function setTimezone($timezone){parent::setTimezone($timezone);}//Sets the time zone for the DateTime object
    public function setDate($year, $month, $day){parent::setDate($year, $month, $day);}//Sets the date
    public function setISODate($year, $week, $day = 1){parent::setISODate($year, $week, $day);}//Sets the ISO date

    public static function createFromFormat($format,$time,DateTimeZone $timezone=null){ parent::createFromFormat($format, $time, $timezone); }//Parses a time string according to a specified format
    public static function getLastErrors(){parent::getLastErrors();}//Returns the warnings and errors
    public static function __set_state($array){parent::__set_state($array);}//The __set_state handler

}