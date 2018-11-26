<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Enumeration;

use BadMethodCallException;
use c3037\Basis\Utils\Assert\Assert;
use InvalidArgumentException;
use function constant;
use function defined;
use function get_class;
use function in_array;

abstract class BaseEnumeration
{
    /**
     * @var mixed[]
     */
    protected const VALUES = [];

    /**
     * @var string[]
     */
    protected const NAMES = [];

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     *
     * @throws InvalidArgumentException
     */
    final public function __construct($value)
    {
        Assert::true(static::contains($value));

        $this->value = $value;
    }

    /**
     * @param mixed[] $arguments
     *
     * @throws BadMethodCallException
     *
     * @return static
     */
    final public static function __callStatic(string $name, array $arguments)
    {
        $const = sprintf('%s::%s', static::class, self::convertCamelCaseToUpperSnakeCase($name));

        if (defined($const)) {
            return new static(constant($const));
        }

        throw new BadMethodCallException(sprintf('No such method: %s', $name));
    }

    /**
     * @param mixed[] $arguments
     *
     * @throws BadMethodCallException
     */
    final public function __call(string $name, array $arguments): bool
    {
        if (strpos($name, 'is') === 0) {
            $name = substr($name, 2);
            $const = sprintf('%s::%s', static::class, self::convertCamelCaseToUpperSnakeCase($name));

            if (defined($const)) {
                return $this->getValue() === constant($const);
            }
        }

        throw new BadMethodCallException(sprintf('No such method: %s', $name));
    }

    final public function __toString(): string
    {
        return (string)$this->getValue();
    }

    /**
     * @return mixed[]
     */
    final public static function getValuesList(): array
    {
        return static::VALUES;
    }

    /**
     * @return mixed[]
     */
    final public static function getNamesList(): array
    {
        return static::NAMES;
    }

    /**
     * @param mixed $value
     */
    final public static function contains($value): bool
    {
        return is_scalar($value) && in_array($value, static::getValuesList(), true);
    }

    /**
     * @return mixed
     */
    final public function getValue()
    {
        return $this->value;
    }

    final public function getName(): ?string
    {
        return static::getNamesList()[$this->getValue()] ?? null;
    }

    final public function equals(BaseEnumeration $enum): bool
    {
        return static::class === get_class($enum) && $this->getValue() === $enum->getValue();
    }

    /**
     * @param mixed[] $valuesList
     */
    final public function belongs(array $valuesList): bool
    {
        return in_array($this->getValue(), $valuesList, true);
    }

    private static function convertCamelCaseToUpperSnakeCase(string $name): string
    {
        return strtoupper(ltrim(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $name), '_'));
    }
}