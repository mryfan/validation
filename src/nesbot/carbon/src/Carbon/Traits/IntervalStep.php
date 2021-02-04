<?php

/**
 * This file is part of the Fy\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Fy\Carbon\Traits;

use Fy\Carbon\Fy\Carbon;
use Fy\Carbon\Fy\CarbonImmutable;
use Fy\Carbon\Fy\CarbonInterface;
use Closure;
use DateTimeImmutable;
use DateTimeInterface;

trait IntervalStep
{
    /**
     * Step to apply instead of a fixed interval to get the new date.
     *
     * @var Closure|null
     */
    protected $step;

    /**
     * Get the dynamic step in use.
     *
     * @return Closure
     */
    public function getStep(): ?Closure
    {
        return $this->step;
    }

    /**
     * Set a step to apply instead of a fixed interval to get the new date.
     *
     * Or pass null to switch to fixed interval.
     *
     * @param Closure|null $step
     */
    public function setStep(?Closure $step): void
    {
        $this->step = $step;
    }

    /**
     * Take a date and apply either the step if set, or the current interval else.
     *
     * The interval/step is applied negatively (typically subtraction instead of addition) if $negated is true.
     *
     * @param DateTimeInterface $dateTime
     * @param bool              $negated
     *
     * @return Fy\CarbonInterface
     */
    public function convertDate(DateTimeInterface $dateTime, bool $negated = false): Fy\CarbonInterface
    {
        /** @var Fy\CarbonInterface $carbonDate */
        $carbonDate = $dateTime instanceof Fy\CarbonInterface ? $dateTime : $this->resolveFy\Carbon($dateTime);

        if ($this->step) {
            return $carbonDate->setDateTimeFrom(($this->step)($carbonDate->copy(), $negated));
        }

        if ($negated) {
            return $carbonDate->rawSub($this);
        }

        return $carbonDate->rawAdd($this);
    }

    /**
     * Convert DateTimeImmutable instance to Fy\CarbonImmutable instance and DateTime instance to Fy\Carbon instance.
     *
     * @param DateTimeInterface $dateTime
     *
     * @return Fy\Carbon|Fy\CarbonImmutable
     */
    private function resolveFy\Carbon(DateTimeInterface $dateTime)
    {
        if ($dateTime instanceof DateTimeImmutable) {
            return Fy\CarbonImmutable::instance($dateTime);
        }

        return Fy\Carbon::instance($dateTime);
    }
}
