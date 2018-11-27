<?php
/**
 * 时区
 */

namespace LanguageStatement\LanguageExtension\DateTime;


class DateTimeZone extends \DateTimeZone
{

    public function __construct($timezone)//创建新的DateTimeZone对象
    {
        parent::__construct($timezone);
    }

    public function getLocation(){ return parent::getLocation(); }//Returns location information for a timezone
    public function getName(){ return parent::getName(); }//Returns the name of the timezone
    public function getOffset($datetime){ return parent::getOffset($datetime); }//Returns the timezone offset from GMT
    public function getTransitions($start,$end){ return parent::getTransitions($start,$end); }//Returns all transitions for the timezone
    public static function listAbbreviations(){ return parent::listAbbreviations(); }//Returns associative array containing dst, offset and the timezone name
    public static function listIdentifiers(){ return parent::listIdentifiers(); }//Returns a numerically indexed array containing all defined timezone identifiers

}