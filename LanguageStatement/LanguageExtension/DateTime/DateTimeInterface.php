<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/21
 * Time: 11:28
 */

namespace LanguageStatement\LanguageExtension\DateTime;


interface DateTimeInterface extends \DateTimeInterface
{
    /**
     *  方法
     * public DateInterval diff ( DateTimeInterface $datetime2 [, bool $absolute = false ] )
     *
     * public string format ( string $format )
     *
     * public int getOffset ( void )
     *
     * public int getTimestamp ( void )
     *
     * public DateTimeZone getTimezone ( void )
     *
     * public __wakeup ( void )
     *
     */
}