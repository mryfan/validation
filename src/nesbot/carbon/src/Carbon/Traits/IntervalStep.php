<?php

/**
 * This file is part of the Fy97Validation\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Carbon\Traits;

use Fy97Validation\Carbon\Carbon;
use Fy97Validation\Carbon\CarbonImmutable;
use Fy97Validation\Carbon\CarbonInterface;
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
     * @return Fy97Validation\CarbonInterface
     */
    public function convertDate(DateTimeInterface $dateTime, bool $negated = false): Fy97Validation\CarbonInterface
    {
        /** @var Fy97Validation\CarbonInterface $carbonDate */
        $carbonDate = $dateTime instanceof Fy97Validation\CarbonInterface ? $dateTime : $this->resolveCarbon($dateTime);

        if ($this->step) {
            return $carbonDate->setDateTimeFrom(($this->step)($carbonDate->avoidMutation(), $negated));
        }

        if ($negated) {
            return $carbonDate->rawSub($this);
        }

        return $carbonDate->rawAdd($this);
    }

    /**
     * Convert DateTimeImmutable instance to Fy97Validation\CarbonImmutable instance and DateTime instance to Fy97Validation\Carbon instance.
     *
     * @param DateTimeInterface $dateTime
     *
     * @return Fy97Validation\Carbon|CarbonImmutable
     */
    private function resolveCarbon(DateTimeInterface $dateTime)
    {
        if ($dateTime instanceof DateTimeImmutable) {
            return Fy97Validation\CarbonImmutable::instance($dateTime);
        }

        return Fy97Validation\Carbon::instance($dateTime);
    }
}
