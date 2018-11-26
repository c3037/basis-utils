<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\DateTime\Mocker;

use c3037\Basis\Utils\DateTime\DateTimeProvider;
use c3037\Basis\Utils\DateTime\Mocker\Exception\BaseMockException;
use c3037\Basis\Utils\DateTime\Mocker\Exception\UnableToFixCurrentTimeException;
use c3037\Basis\Utils\DateTime\Mocker\Exception\UnableToFixTimeZoneException;
use c3037\Basis\Utils\DateTime\TimeZoneProvider;
use c3037\Basis\Utils\Reflection\ReflectionHelper;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use ReflectionException;

final class Mocker
{
    /**
     * @throws BaseMockException
     * @throws UnableToFixCurrentTimeException
     */
    public static function fixCurrentTime(?DateTimeInterface $dateTime): void
    {
        try {
            ReflectionHelper::setStaticProperty(DateTimeProvider::class, 'currentTimeForTests', $dateTime);
        } catch (ReflectionException $e) {
            $errorMessage = sprintf(
                "Cannot fix DateTime '%s'",
                $dateTime !== null ? $dateTime->format(DateTimeImmutable::ATOM) : 'null'
            );

            throw new UnableToFixCurrentTimeException($errorMessage, 0, $e);
        }
    }

    /**
     * @throws BaseMockException
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
