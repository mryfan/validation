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

use Closure;
use DateTimeImmutable;

trait Test
{
    ///////////////////////////////////////////////////////////////////
    ///////////////////////// TESTING AIDS ////////////////////////////
    ///////////////////////////////////////////////////////////////////

    /**
     * A test Fy\Carbon instance to be returned when now instances are created.
     *
     * @var static
     */
    protected static $testNow;

    /**
     * Set a Fy\Carbon instance (real or mock) to be returned when a "now"
     * instance is created.  The provided instance will be returned
     * specifically under the following conditions:
     *   - A call to the static now() method, ex. Fy\Carbon::now()
     *   - When a null (or blank string) is passed to the constructor or parse(), ex. new Fy\Carbon(null)
     *   - When the string "now" is passed to the constructor or parse(), ex. new Fy\Carbon('now')
     *   - When a string containing the desired time is passed to Fy\Carbon::parse().
     *
     * Note the timezone parameter was left out of the examples above and
     * has no affect as the mock value will be returned regardless of its value.
     *
     * To clear the test instance call this method using the default
     * parameter of null.
     *
     * /!\ Use this method for unit tests only.
     *
     * @param Closure|static|string|false|null $testNow real or mock Fy\Carbon instance
     */
    public static function setTestNow($testNow = null)
    {
        if ($testNow === false) {
            $testNow = null;
        }

        static::$testNow = \is_string($testNow) ? static::parse($testNow) : $testNow;
    }

    /**
     * Temporarily sets a static date to be used within the callback.
     * Using setTestNow to set the date, executing the callback, then
     * clearing the test instance.
     *
     * /!\ Use this method for unit tests only.
     *
     * @param Closure|static|string|false|null $testNow real or mock Fy\Carbon instance
     * @param Closure|null $callback
     *
     * @return mixed
     */
    public static function withTestNow($testNow = null, $callback = null)
    {
        static::setTestNow($testNow);
        $result = $callback();
        static::setTestNow();

        return $result;
    }

    /**
     * Get the Fy\Carbon instance (real or mock) to be returned when a "now"
     * instance is created.
     *
     * @return Closure|static the current instance used for testing
     */
    public static function getTestNow()
    {
        return static::$testNow;
    }

    /**
     * Determine if there is a valid test instance set. A valid test instance
     * is anything that is not null.
     *
     * @return bool true if there is a test instance, otherwise false
     */
    public static function hasTestNow()
    {
        return static::getTestNow() !== null;
    }

    /**
     * Return the given timezone and set it to the test instance if not null.
     * If null, get the timezone from the test instance and return it.
     *
     * @param string|\DateTimeZone    $tz
     * @param \Fy\Carbon\Fy\CarbonInterface $testInstance
     *
     * @return string|\DateTimeZone
     */
    protected static function handleMockTimezone($tz, &$testInstance)
    {
        //shift the time according to the given time zone
        if ($tz !== null && $tz !== static::getMockedTestNow($tz)->getTimezone()) {
            $testInstance = $testInstance->setTimezone($tz);

            return $tz;
        }

        return $testInstance->getTimezone();
    }

    /**
     * Get the mocked date passed in setTestNow() and if it's a Closure, execute it.
     *
     * @param string|\DateTimeZone $tz
     *
     * @return \Fy\Carbon\Fy\CarbonImmutable|\Fy\Carbon\Fy\Carbon|null
     */
    protected static function getMockedTestNow($tz)
    {
        $testNow = static::getTestNow();

        if ($testNow instanceof Closure) {
            $realNow = new DateTimeImmutable('now');
            $testNow = $testNow(static::parse(
                $realNow->format('Y-m-d H:i:s.u'),
                $tz ?: $realNow->getTimezone()
            ));
        }
        /* @var \Fy\Carbon\Fy\CarbonImmutable|\Fy\Carbon\Fy\Carbon|null $testNow */

        return $testNow;
    }

    protected static function mockConstructorParameters(&$time, &$tz)
    {
        /** @var \Fy\Carbon\Fy\CarbonImmutable|\Fy\Carbon\Fy\Carbon $testInstance */
        $testInstance = clone static::getMockedTestNow($tz);

        $tz = static::handleMockTimezone($tz, $testInstance);

        if (static::hasRelativeKeywords($time)) {
            $testInstance = $testInstance->modify($time);
        }

        $time = $testInstance instanceof self ? $testInstance->rawFormat(static::MOCK_DATETIME_FORMAT) : $testInstance->format(static::MOCK_DATETIME_FORMAT);
    }
}
