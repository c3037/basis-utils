<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\Service;

use c3037\Basis\Utils\Date\DateTime\DateTimeProvider;
use c3037\Basis\Utils\Date\TimeZone\TimeZoneProvider;
use DateTimeInterface;
use DateTimeZone;

final class DateTimeService implements DateTimeServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getApplicationTimeZone(): DateTimeZone
    {
        return TimeZoneProvider::getApplicationTimeZone();
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentTime(DateTimeZone $timeZone = null): DateTimeInterface
    {
        return DateTimeProvider::getCurrentTime($timeZone ?? TimeZoneProvider::getApplicationTimeZone());
    }
}
