<?php
declare(strict_types=1);

namespace c3037\Basis\Utils\DateTime\Service;

use DateTimeInterface;
use DateTimeZone;

interface DateTimeServiceInterface
{
    public function getApplicationTimeZone(): DateTimeZone;

    public function getCurrentTime(DateTimeZone $timeZone = null): DateTimeInterface;
}
