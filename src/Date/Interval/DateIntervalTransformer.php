<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\Interval;

use c3037\Basis\Utils\Date\DateTime\DateTimeManager;
use c3037\Basis\Utils\Date\DateTime\Factory\DateTimeFactory;
use c3037\Basis\Utils\Date\TimeZone\TimeZoneProvider;
use DateInterval;
use DateTime;

final class DateIntervalTransformer
{
    private const UNIX_EPOCH_STARTED_AT = '1970-01-01T00:00:00+00:00';

    public static function toSeconds(DateInterval $interval): int
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $originalTime = DateTimeFactory::createFromFormat(
            DateTime::ATOM,
            self::UNIX_EPOCH_STARTED_AT,
            TimeZoneProvider::getApplicationTimeZone()
        );
        $timeWithInterval = DateTimeManager::addInterval($originalTime, $interval);

        return $timeWithInterval->getTimestamp() - $originalTime->getTimestamp();
    }

    private function __construct()
    {
        /*_*/
    }
}