<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\Range;

use c3037\Basis\Utils\Assert\Assert;
use DateTimeInterface;
use InvalidArgumentException;

final class Range
{
    /**
     * (including)
     *
     * @var DateTimeInterface
     */
    private $from;

    /**
     * (including)
     *
     * @var DateTimeInterface
     */
    private $to;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(DateTimeInterface $from, DateTimeInterface $to)
    {
        Assert::true($from <= $to);

        $this->from = clone $from;
        $this->to = clone $to;
    }

    public function getFrom(): DateTimeInterface
    {
        return clone $this->from;
    }

    public function getTo(): DateTimeInterface
    {
        return clone $this->to;
    }

    public function __clone()
    {
        $this->from = clone $this->from;
        $this->to = clone $this->to;
    }
}
