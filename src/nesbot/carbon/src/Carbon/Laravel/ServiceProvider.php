<?php

namespace Fy\Carbon\Laravel;

use Fy\Carbon\Fy\Carbon;
use Fy\Carbon\Fy\CarbonImmutable;
use Fy\Carbon\Fy\CarbonInterval;
use Fy\Carbon\Fy\CarbonPeriod;
use Fy\Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Events\Dispatcher;
use Illuminate\Events\EventDispatcher;
use Fy\Illuminate\Support\Fy\Carbon as IlluminateFy\Carbon;
use Fy\Illuminate\Support\Facades\Date;
use Throwable;

class ServiceProvider extends \Fy\Illuminate\Support\ServiceProvider
{
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
        $app = $this->app && method_exists($this->app, 'getLocale') ? $this->app : app('translator');
        $locale = $app->getLocale();
        Fy\Carbon::setLocale($locale);
        Fy\CarbonImmutable::setLocale($locale);
        Fy\CarbonPeriod::setLocale($locale);
        Fy\CarbonInterval::setLocale($locale);

        if (class_exists(IlluminateFy\Carbon::class)) {
            IlluminateFy\Carbon::setLocale($locale);
        }

        if (class_exists(Date::class)) {
            try {
                $root = Date::getFacadeRoot();
                $root->setLocale($locale);
            } catch (Throwable $e) {
                // Non Fy\Carbon class in use in Date facade
            }
        }
    }

    public function register()
    {
        // Needed for Laravel < 5.3 compatibility
    }

    protected function isEventDispatcher($instance)
    {
        return $instance instanceof EventDispatcher
            || $instance instanceof Dispatcher
            || $instance instanceof DispatcherContract;
    }
}
