<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\TimeZone\Mocker;

use c3037\Basis\Utils\Date\TimeZone\Mocker\Exception\UnableToFixTimeZoneException;
use c3037\Basis\Utils\Date\TimeZone\TimeZoneProvider;
use c3037\Basis\Utils\Reflection\ReflectionHelper;
use DateTimeZone;
use ReflectionException;

final class TimeZoneMocker
{
    /**
     * @throws UnableToFixTimeZoneException
     */
    public static function fixApplicationTimeZone(?DateTimeZone $timeZone): void
    {
        try {
            ReflectionHelper::setStaticProperty(TimeZoneProvider::class, 'currentZoneForTests', $timeZone);
        } catch (ReflectionException $e) {
            $errorMessage = sprintf(
                "Cannot fix DateTimeZone '%s'",
                $timeZone !== null ? $timeZone->getName() : 'null'
            );

            throw new UnableToFixTimeZoneException($errorMessage, 0, $e);
        }
    }

    private function __construct()
    {
        /*_*/
    }
}
