<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Assert;

use Webmozart\Assert\Assert as BaseAssert;

/**
 * {@inheritdoc}
 */
final class Assert extends BaseAssert
{
    /**
     * {@inheritdoc}
     */
    public static function isIterable($value, $message = ''): void
    {
        if (!is_iterable($value)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected an iterable. Got: %s',
                static::typeToString($value)
            ));
        }
    }
}
