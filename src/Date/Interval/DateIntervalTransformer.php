<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\Interval;

use DateInterval;
use DateTime;
use DateTimeImmutable;

final class DateIntervalTransformer
{
    private const UNIX_EPOCH_STARTED_AT = '1970-01-01T00:00:00+00:00';

    public static function toSeconds(DateInterval $interval): int
    {
        $originalTime = DateTimeImmutable::createFromFormat(DateTime::ATOM, self::UNIX_EPOCH_STARTED_AT);
        $timeWithInterval = $originalTime->add($interval);

        return $timeWithInterval->getTimestamp() - $originalTime->getTimestamp();
    }

    private function __construct()
    {
        /*_*/
    }
}