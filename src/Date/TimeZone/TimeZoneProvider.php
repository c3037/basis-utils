<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\TimeZone;

use DateTimeZone;

final class TimeZoneProvider
{
    /**
     * @var DateTimeZone
     */
    private static $currentZoneForTests;

    public static function getApplicationTimeZone(): DateTimeZone
    {
        if (self::$currentZoneForTests !== null) {
            return clone self::$currentZoneForTests;
        }

        return new DateTimeZone(date_default_timezone_get());
    }

    private function __construct()
    {
        /*_*/
    }
}
