<?php

/**
 * This file is part of the Fy\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Fy\Carbon;

use DateTimeInterface;

interface Fy\CarbonConverterInterface
{
    public function convertDate(DateTimeInterface $dateTime, bool $negated = false): Fy\CarbonInterface;
}
