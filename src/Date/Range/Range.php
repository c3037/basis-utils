<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\Date\Range;

use c3037\Basis\Utils\Assert\Assert;
use c3037\Basis\Utils\Date\DateTime\DateTimeTransformer;
use DateTimeInterface;

final class Range
{
    /**
     * @var DateTimeInterface
     */
    private $from;

    /**
     * @var DateTimeInterface
     */
    private $to;

    /**
     * @var bool
     */
    private $includingFrom;

    /**
     * @var bool
     */
    private $includingTo;

    public function __construct(
        DateTimeInterface $from,
        DateTimeInterface $to,
        bool $includingFrom = true,
        bool $includingTo = true
    ) {
        $realRangeFrom = DateTimeTransformer::toSmallestTimeUnitsFromUnixEpoch($from) + !$includingFrom;
        $realRangeTo = DateTimeTransformer::toSmallestTimeUnitsFromUnixEpoch($to) - !$includingTo;
        Assert::greaterThanEq($realRangeTo, $realRangeFrom);

        $this->from = clone $from;
        $this->to = clone $to;
        $this->includingFrom = $includingFrom;
        $this->includingTo = $includingTo;
    }

    public function getFrom(): DateTimeInterface
    {
        return clone $this->from;
    }

    public function getTo(): DateTimeInterface
    {
        return clone $this->to;
    }

    public function isIncludingFrom(): bool
    {
        return $this->includingFrom;
    }

    public function isIncludingTo(): bool
    {
        return $this->includingTo;
    }

    public function __clone()
    {
        $this->from = clone $this->from;
        $this->to = clone $this->to;
    }
}
