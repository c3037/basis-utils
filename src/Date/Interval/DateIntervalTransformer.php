<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\Interval;

use DateInterval;
use DateTimeImmutable;

final class DateIntervalTransformer
{
    private const TIME_POINT = '1970-01-01T00:00:00+00:00';

    public static function toSeconds(DateInterval $interval): int
    {
        $reference = DateTimeImmutable::createFromFormat(DateTimeImmutable::ATOM, self::TIME_POINT);
        $endTime = $reference->add($interval);

        return $endTime->getTimestamp() - $reference->getTimestamp();
    }

    private function __construct()
    {
        /*_*/
    }
}