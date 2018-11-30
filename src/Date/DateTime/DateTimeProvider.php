<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\DateTime;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

final class DateTimeProvider
{
    /**
     * @var DateTimeInterface
     */
    private static $currentTimeForTests;

    public static function getCurrentTime(DateTimeZone $timeZone): DateTimeInterface
    {
        if (self::$currentTimeForTests !== null) {
            return clone self::$currentTimeForTests;
        }

        /** @noinspection PhpUnhandledExceptionInspection */
        return new DateTimeImmutable('now', clone $timeZone);
    }

    private function __construct()
    {
        /*_*/
    }
}
