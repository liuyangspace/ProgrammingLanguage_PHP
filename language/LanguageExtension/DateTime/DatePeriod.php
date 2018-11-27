<?php
/**
 * 多个时间点（可用foreach）
 */

namespace LanguageStatement\LanguageExtension\DateTime;


class DatePeriod extends \DatePeriod
{
    public function __construct(\DateTimeInterface $start, \DateInterval $interval, \DateTimeInterface $end, $options)
    {
        parent::__construct($start, $interval, $end, $options);
    }

    public function getDateInterval(){ return parent::getDateInterval(); }//Gets the interval
    public function getStartDate(){ return parent::getStartDate(); }//Gets the start date
    public function getEndDate(){ return parent::getEndDate(); }//Gets the end date
}