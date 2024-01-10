<?php
namespace Fy97Validation\Illuminate\Support;

use Fy97Validation\Illuminate\Support\Arr;
use Fy97Validation\Illuminate\Support\Collection;




class helpers_new{

static     function collect($value = null)
    {
        return new Collection($value);
    }
static     function data_fill(&$target, $key, $value)
    {
        return \Fy97Validation\Illuminate\Support\helpers_new::data_set($target, $key, $value, false);
    }
static     function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        foreach ($key as $i => $segment) {
            unset($key[$i]);

            if (is_null($segment)) {
                return $target;
            }

            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return \Fy97Validation\Illuminate\Support\helpers_new::value($default);
                }

                $result = [];

                foreach ($target as $item) {
                    $result[] = \Fy97Validation\Illuminate\Support\helpers_new::data_get($item, $key);
                }

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return \Fy97Validation\Illuminate\Support\helpers_new::value($default);
            }
        }

        return $target;
    }
static     function data_set(&$target, $key, $value, $overwrite = true)
    {
        $segments = is_array($key) ? $key : explode('.', $key);

        if (($segment = array_shift($segments)) === '*') {
            if (! Arr::accessible($target)) {
                $target = [];
            }

            if ($segments) {
                foreach ($target as &$inner) {
                    \Fy97Validation\Illuminate\Support\helpers_new::data_set($inner, $segments, $value, $overwrite);
                }
            } elseif ($overwrite) {
                foreach ($target as &$inner) {
                    $inner = $value;
                }
            }
        } elseif (Arr::accessible($target)) {
            if ($segments) {
                if (! Arr::exists($target, $segment)) {
                    $target[$segment] = [];
                }

                \Fy97Validation\Illuminate\Support\helpers_new::data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite || ! Arr::exists($target, $segment)) {
                $target[$segment] = $value;
            }
        } elseif (is_object($target)) {
            if ($segments) {
                if (! isset($target->{$segment})) {
                    $target->{$segment} = [];
                }

                \Fy97Validation\Illuminate\Support\helpers_new::data_set($target->{$segment}, $segments, $value, $overwrite);
            } elseif ($overwrite || ! isset($target->{$segment})) {
                $target->{$segment} = $value;
            }
        } else {
            $target = [];

            if ($segments) {
                \Fy97Validation\Illuminate\Support\helpers_new::data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite) {
                $target[$segment] = $value;
            }
        }

        return $target;
    }
static     function head($array)
    {
        return reset($array);
    }
static     function last($array)
    {
        return end($array);
    }
static     function value($value, ...$args)
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}
