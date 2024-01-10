<?php
namespace Fy97Validation\Illuminate\Support;

use Fy97Validation\Illuminate\Contracts\Support\DeferringDisplayableValue;
use Fy97Validation\Illuminate\Contracts\Support\Htmlable;
use Fy97Validation\Illuminate\Support\Arr;
use Fy97Validation\Illuminate\Support\Env;
use Fy97Validation\Illuminate\Support\HigherOrderTapProxy;
use Fy97Validation\Illuminate\Support\Optional;




class helpers1_new{

static     function append_config(array $array)
    {
        $start = 9999;

        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $start++;

                $array[$start] = Arr::pull($array, $key);
            }
        }

        return $array;
    }
static     function blank($value)
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
static     function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
static     function class_uses_recursive($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $results = [];

        foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
            $results += \Fy97Validation\Illuminate\Support\helpers1_new::trait_uses_recursive($class);
        }

        return array_unique($results);
    }
static     function e($value, $doubleEncode = true)
    {
        if ($value instanceof DeferringDisplayableValue) {
            $value = $value->resolveDisplayableValue();
        }

        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8', $doubleEncode);
    }
static     function env($key, $default = null)
    {
        return Env::get($key, $default);
    }
static     function filled($value)
    {
        return ! \Fy97Validation\Illuminate\Support\helpers1_new::blank($value);
    }
static     function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) === '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_object($object) || ! isset($object->{$segment})) {
                return \Fy97Validation\Illuminate\Support\helpers_new::value($default);
            }

            $object = $object->{$segment};
        }

        return $object;
    }
static     function optional($value = null, callable $callback = null)
    {
        if (is_null($callback)) {
            return new Optional($value);
        } elseif (! is_null($value)) {
            return $callback($value);
        }
    }
static     function preg_replace_array($pattern, array $replacements, $subject)
    {
        return preg_replace_callback($pattern, function () use (&$replacements) {
            foreach ($replacements as $key => $value) {
                return array_shift($replacements);
            }
        }, $subject);
    }
static     function retry($times, callable $callback, $sleepMilliseconds = 0, $when = null)
    {
        $attempts = 0;

        beginning:
        $attempts++;
        $times--;

        try {
            return $callback($attempts);
        } catch (Exception $e) {
            if ($times < 1 || ($when && ! $when($e))) {
                throw $e;
            }

            if ($sleepMilliseconds) {
                usleep(value($sleepMilliseconds, $attempts) * 1000);
            }

            goto beginning;
        }
    }
static     function tap($value, $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderTapProxy($value);
        }

        $callback($value);

        return $value;
    }
static     function throw_if($condition, $exception = 'RuntimeException', ...$parameters)
    {
        if ($condition) {
            if (is_string($exception) && class_exists($exception)) {
                $exception = new $exception(...$parameters);
            }

            throw is_string($exception) ? new RuntimeException($exception) : $exception;
        }

        return $condition;
    }
static     function throw_unless($condition, $exception = 'RuntimeException', ...$parameters)
    {
        \Fy97Validation\Illuminate\Support\helpers1_new::throw_if(! $condition, $exception, ...$parameters);

        return $condition;
    }
static     function trait_uses_recursive($trait)
    {
        $traits = class_uses($trait) ?: [];

        foreach ($traits as $trait) {
            $traits += \Fy97Validation\Illuminate\Support\helpers1_new::trait_uses_recursive($trait);
        }

        return $traits;
    }
static     function transform($value, callable $callback, $default = null)
    {
        if (filled($value)) {
            return $callback($value);
        }

        if (is_callable($default)) {
            return $default($value);
        }

        return $default;
    }
static     function windows_os()
    {
        return PHP_OS_FAMILY === 'Windows';
    }
static     function with($value, callable $callback = null)
    {
        return is_null($callback) ? $value : $callback($value);
    }
}
