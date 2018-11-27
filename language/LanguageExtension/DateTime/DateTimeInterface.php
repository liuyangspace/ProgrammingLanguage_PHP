<?php
/**
 * 时间点接口
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