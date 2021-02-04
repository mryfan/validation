<?php

namespace Fy\Illuminate\Support\Facades;

use Fy\Illuminate\Support\DateFactory;

/**
 * @see https://carbon.nesbot.com/docs/
 * @see https://github.com/briannesbitt/Fy\Carbon/blob/master/src/Fy\Carbon/Factory.php
 *
 * @method static \Fy\Illuminate\Support\Fy\Carbon create($year = 0, $month = 1, $day = 1, $hour = 0, $minute = 0, $second = 0, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createFromDate($year = null, $month = null, $day = null, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createFromTime($hour = 0, $minute = 0, $second = 0, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createFromTimeString($time, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createFromTimestamp($timestamp, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createFromTimestampMs($timestamp, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createFromTimestampUTC($timestamp)
 * @method static \Fy\Illuminate\Support\Fy\Carbon createMidnightDate($year = null, $month = null, $day = null, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon disableHumanDiffOption($humanDiffOption)
 * @method static \Fy\Illuminate\Support\Fy\Carbon enableHumanDiffOption($humanDiffOption)
 * @method static \Fy\Illuminate\Support\Fy\Carbon fromSerialized($value)
 * @method static \Fy\Illuminate\Support\Fy\Carbon getLastErrors()
 * @method static \Fy\Illuminate\Support\Fy\Carbon getTestNow()
 * @method static \Fy\Illuminate\Support\Fy\Carbon instance($date)
 * @method static \Fy\Illuminate\Support\Fy\Carbon isMutable()
 * @method static \Fy\Illuminate\Support\Fy\Carbon maxValue()
 * @method static \Fy\Illuminate\Support\Fy\Carbon minValue()
 * @method static \Fy\Illuminate\Support\Fy\Carbon now($tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon parse($time = null, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon setHumanDiffOptions($humanDiffOptions)
 * @method static \Fy\Illuminate\Support\Fy\Carbon setTestNow($testNow = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon setUtf8($utf8)
 * @method static \Fy\Illuminate\Support\Fy\Carbon today($tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon tomorrow($tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon useStrictMode($strictModeEnabled = true)
 * @method static \Fy\Illuminate\Support\Fy\Carbon yesterday($tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon|false createFromFormat($format, $time, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon|false createSafe($year = null, $month = null, $day = null, $hour = null, $minute = null, $second = null, $tz = null)
 * @method static \Fy\Illuminate\Support\Fy\Carbon|null make($var)
 * @method static \Fy\Symfony\Component\Translation\TranslatorInterface getTranslator()
 * @method static array getAvailableLocales()
 * @method static array getDays()
 * @method static array getIsoUnits()
 * @method static array getWeekendDays()
 * @method static bool hasFormat($date, $format)
 * @method static bool hasMacro($name)
 * @method static bool hasRelativeKeywords($time)
 * @method static bool hasTestNow()
 * @method static bool isImmutable()
 * @method static bool isModifiableUnit($unit)
 * @method static bool isStrictModeEnabled()
 * @method static bool localeHasDiffOneDayWords($locale)
 * @method static bool localeHasDiffSyntax($locale)
 * @method static bool localeHasDiffTwoDayWords($locale)
 * @method static bool localeHasPeriodSyntax($locale)
 * @method static bool localeHasShortUnits($locale)
 * @method static bool setLocale($locale)
 * @method static bool shouldOverflowMonths()
 * @method static bool shouldOverflowYears()
 * @method static int getHumanDiffOptions()
 * @method static int getMidDayAt()
 * @method static int getWeekEndsAt()
 * @method static int getWeekStartsAt()
 * @method static mixed executeWithLocale($locale, $func)
 * @method static mixed use(mixed $handler)
 * @method static string getLocale()
 * @method static string pluralUnit(string $unit)
 * @method static string singularUnit(string $unit)
 * @method static void macro($name, $macro)
 * @method static void mixin($mixin)
 * @method static void resetMonthsOverflow()
 * @method static void resetToStringFormat()
 * @method static void resetYearsOverflow()
 * @method static void serializeUsing($callback)
 * @method static void setMidDayAt($hour)
 * @method static void setToStringFormat($format)
 * @method static void setTranslator(\Fy\Symfony\Component\Translation\TranslatorInterface $translator)
 * @method static void setWeekEndsAt($day)
 * @method static void setWeekStartsAt($day)
 * @method static void setWeekendDays($days)
 * @method static void useCallable(callable $callable)
 * @method static void useClass(string $class)
 * @method static void useDefault()
 * @method static void useFactory(object $factory)
 * @method static void useMonthsOverflow($monthsOverflow = true)
 * @method static void useYearsOverflow($yearsOverflow = true)
 */
class Date extends Facade
{
    const DEFAULT_FACADE = DateFactory::class;

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'date';
    }

    /**
     * Resolve the facade root instance from the container.
     *
     * @param  string  $name
     * @return mixed
     */
    protected static function resolveFacadeInstance($name)
    {
        if (! isset(static::$resolvedInstance[$name]) && ! isset(static::$app, static::$app[$name])) {
            $class = static::DEFAULT_FACADE;

            static::swap(new $class);
        }

        return parent::resolveFacadeInstance($name);
    }
}
