<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\DateTime\Mocker;

use c3037\Basis\Utils\Date\DateTime\DateTimeProvider;
use c3037\Basis\Utils\Date\DateTime\Mocker\Exception\UnableToFixCurrentTimeException;
use c3037\Basis\Utils\Reflection\ReflectionHelper;
use DateTimeImmutable;
use DateTimeInterface;
use ReflectionException;

final class DateTimeMocker
{
    /**
     * @throws UnableToFixCurrentTimeException
     */
    public static function fixCurrentTime(?DateTimeInterface $dateTime): void
    {
        try {
            ReflectionHelper::setStaticProperty(DateTimeProvider::class, 'currentTimeForTests', $dateTime);
        } catch (ReflectionException $e) {
            $errorMessage = sprintf(
                "Cannot fix Date '%s'",
                $dateTime !== null ? $dateTime->format(DateTimeImmutable::ATOM) : 'null'
            );

            throw new UnableToFixCurrentTimeException($errorMessage, 0, $e);
        }
    }

    private function __construct()
    {
        /*_*/
    }
}
