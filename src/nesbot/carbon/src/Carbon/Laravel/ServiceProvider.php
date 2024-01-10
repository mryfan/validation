<?php

/**
 * This file is part of the Fy97Validation\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Carbon\Laravel;

use Fy97Validation\Carbon\Carbon;
use Fy97Validation\Carbon\CarbonImmutable;
use Fy97Validation\Carbon\CarbonInterval;
use Fy97Validation\Carbon\CarbonPeriod;
use Fy97Validation\Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Events\Dispatcher;
use Illuminate\Events\EventDispatcher;
use Fy97Validation\Illuminate\Support\Carbon as IlluminateCarbon;
use Fy97Validation\Illuminate\Support\Facades\Date;
use Throwable;

class ServiceProvider extends \Fy97Validation\Illuminate\Support\ServiceProvider
{
    /** @var callable|null */
    protected $appGetter = null;

    /** @var callable|null */
    protected $localeGetter = null;

    public function setAppGetter(?callable $appGetter): void
    {
        $this->appGetter = $appGetter;
    }

    public function setLocaleGetter(?callable $localeGetter): void
    {
        $this->localeGetter = $localeGetter;
    }

    public function boot()
    {
        $this->updateLocale();

        if (!$this->app->bound('events')) {
            return;
        }

        $service = $this;
        $events = $this->app['events'];

        if ($this->isEventDispatcher($events)) {
            $events->listen(class_exists('Illuminate\Foundation\Events\LocaleUpdated') ? 'Illuminate\Foundation\Events\LocaleUpdated' : 'locale.changed', function () use ($service) {
                $service->updateLocale();
            });
        }
    }

    public function updateLocale()
    {
        $locale = $this->getLocale();

        if ($locale === null) {
            return;
        }

        Fy97Validation\Carbon::setLocale($locale);
        Fy97Validation\CarbonImmutable::setLocale($locale);
        Fy97Validation\CarbonPeriod::setLocale($locale);
        Fy97Validation\CarbonInterval::setLocale($locale);

        if (class_exists(IlluminateCarbon::class)) {
            IlluminateCarbon::setLocale($locale);
        }

        if (class_exists(Date::class)) {
            try {
                $root = Date::getFacadeRoot();
                $root->setLocale($locale);
            } catch (Throwable $e) {
                // Non Fy97Validation\Carbon class in use in Date facade
            }
        }
    }

    public function register()
    {
        // Needed for Laravel < 5.3 compatibility
    }

    protected function getLocale()
    {
        if ($this->localeGetter) {
            return ($this->localeGetter)();
        }

        $app = $this->getApp();
        $app = $app && method_exists($app, 'getLocale')
            ? $app
            : $this->getGlobalApp('translator');

        return $app ? $app->getLocale() : null;
    }

    protected function getApp()
    {
        if ($this->appGetter) {
            return ($this->appGetter)();
        }

        return $this->app ?? $this->getGlobalApp();
    }

    protected function getGlobalApp(...$args)
    {
        return \function_exists('app') ? \app(...$args) : null;
    }

    protected function isEventDispatcher($instance)
    {
        return $instance instanceof EventDispatcher
            || $instance instanceof Dispatcher
            || $instance instanceof DispatcherContract;
    }
}
