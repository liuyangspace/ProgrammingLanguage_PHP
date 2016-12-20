<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/20
 * Time: 17:40
 */

namespace LanguageStatement\LanguageExtension\DateTime;


class DatePeriod extends \DatePeriod
{
    public function __construct(\DateTimeInterface $start, \DateInterval $interval, \DateTimeInterface $end, $options)
    {
        parent::__construct($start, $interval, $end, $options);
    }
}