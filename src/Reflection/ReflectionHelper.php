<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Reflection;

use ReflectionException;
use ReflectionProperty;

final class ReflectionHelper
{
    /**
     * @throws ReflectionException
     */
    public static function setStaticProperty(string $class, string $property, $value): void
    {
        $reflection = new ReflectionProperty($class, $property);
        $reflection->setAccessible(true);
        $reflection->setValue(null, $value);
    }

    private function __construct()
    {
        /*_*/
    }
}
