<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\DateTime;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

final class DateTimeManager
{
    public static function addInterval(DateTimeInterface $time, DateInterval $interval): DateTimeInterface
    {
        return self::convertToDateTimeImmutable($time)->add($interval);
    }

    public static function subInterval(DateTimeInterface $time, DateInterval $interval): DateTimeInterface
    {
        return self::convertToDateTimeImmutable($time)->sub($interval);
    }

    public static function changeTimeZone(DateTimeInterface $time, DateTimeZone $timeZone): DateTimeInterface
    {
        return self::convertToDateTimeImmutable($time)->setTimezone(clone $timeZone);
    }

    private static function convertToDateTimeImmutable(DateTimeInterface $time): DateTimeImmutable
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return new DateTimeImmutable($time->format(DateTimeImmutable::ATOM));
    }

    private function __construct()
    {
        /*_*/
    }
}
