<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\DateTime\DateTimeFactory;

use c3037\Basis\Utils\DateTime\DateTimeFactory\Exception\UnableToCreateDateTimeException;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

final class DateTimeFactory
{
    public const FORMAT_ATOM = DateTimeImmutable::ATOM;

    /**
     * @throws UnableToCreateDateTimeException
     */
    public static function createFromFormat(string $format, string $time, DateTimeZone $timeZone): DateTimeInterface
    {
        $dateTime = DateTimeImmutable::createFromFormat($format, $time, clone $timeZone);

        if (!$dateTime) {
            $errorMessage = sprintf(
                "Cannot create DateTimeImmutable from format '%s', time '%s' and timeZone '%s'",
                $format,
                $time,
                $timeZone->getName()
            );

            throw new UnableToCreateDateTimeException($errorMessage);
        }

        return $dateTime;
    }

    private function __construct()
    {
        /*_*/
    }
}
