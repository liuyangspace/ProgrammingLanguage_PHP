<?php
/**
 *
 */

namespace LanguageStatement\LanguageExtension\DateTime;


class DateTimeImmutable extends \DateTimeImmutable
{
    public function __construct($time, $timezone)
    {
        parent::__construct($time, $timezone);
    }

    public function add(DateInterval $interval){parent::add($interval);}//Like DateTime::add() but works with DateTimeImmutable.
    public function sub(DateInterval $interval){parent::sub($interval);}//
    public function modify($modify){parent::modify($modify);}
    public function setTime($hour, $minute, $second = 0){parent::setTime($hour, $minute, $second);}
    public function setTimestamp($unixtimestamp){parent::setTimestamp($unixtimestamp);}
    public function setDate($year, $month, $day){parent::setDate($year, $month, $day);}
    public function setISODate($year, $week, $day = 1){parent::setISODate($year, $week, $day);}
    public function setTimezone(DateTimeZone $timezone){parent::setTimezone($timezone);}

    public static function createFromFormat($format, $time, DateTimeZone $timezone){parent::createFromFormat($format, $time, $timezone);}
    public static function createFromMutable(DateTime $dateTime){parent::createFromMutable($dateTime);}
    public static function getLastErrors(){parent::getLastErrors();}
    public static function __set_state(array $array){parent::__set_state($array);}

}