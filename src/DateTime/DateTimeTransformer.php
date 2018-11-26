<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\DateTime;

use DateTimeInterface;

final class DateTimeTransformer
{
    public static function toMicrosecondsFromUnixEpoch(DateTimeInterface $time): int
    {
        return (int)$time->format('U') * 1000000 + (int)$time->format('u');
    }

    private function __construct()
    {
        /*_*/
    }
}
