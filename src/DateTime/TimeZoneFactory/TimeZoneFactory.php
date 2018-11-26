<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\DateTime\TimeZoneFactory;

use c3037\Basis\Utils\DateTime\TimeZoneFactory\Exception\UnableToCreateTimeZoneException;
use DateTimeZone;
use Exception;

final class TimeZoneFactory
{
    public const TIME_ZONE_GMT = 'GMT';

    /**
     * @throws UnableToCreateTimeZoneException
     */
    public static function createFromString(string $timeZone): DateTimeZone
    {
        try {
            return new DateTimeZone($timeZone);
        } catch (Exception $e) {
            throw new UnableToCreateTimeZoneException(
                sprintf("Cannot create DateTimeZone from string '%s'", $timeZone)
            );
        }
    }

    private function __construct()
    {
        /*_*/
    }
}
