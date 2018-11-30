<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\DateTime;

use DateTimeInterface;

final class DateTimeTransformer
{
    public static function toSmallestTimeUnitsFromUnixEpoch(DateTimeInterface $time): int
    {
        return self::toMicrosecondsFromUnixEpoch($time);
    }

    public static function toMicrosecondsFromUnixEpoch(DateTimeInterface $time): int
    {
        return (int)$time->format('U') * 1000000 + (int)$time->format('u');
    }

    public static function toSecondsFromUnixEpoch(DateTimeInterface $time): int
    {
        return $time->getTimestamp();
    }

    private function __construct()
    {
        /*_*/
    }
}
