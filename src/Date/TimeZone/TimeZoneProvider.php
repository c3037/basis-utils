<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\TimeZone;

use c3037\Basis\Utils\Date\TimeZone\Factory\TimeZoneFactory;
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

        /** @noinspection PhpUnhandledExceptionInspection */
        return TimeZoneFactory::createFromString(date_default_timezone_get());
    }

    private function __construct()
    {
        /*_*/
    }
}
