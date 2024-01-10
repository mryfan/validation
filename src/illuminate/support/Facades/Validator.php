<?php

namespace Fy97Validation\Illuminate\Support\Facades;

/**
 * @method static \Fy97Validation\Illuminate\Contracts\Validation\Validator make(array $data, array $rules, array $messages = [], array $customAttributes = [])
 * @method static void excludeUnvalidatedArrayKeys()
 * @method static void extend(string $rule, \Closure|string $extension, string $message = null)
 * @method static void extendImplicit(string $rule, \Closure|string $extension, string $message = null)
 * @method static void replacer(string $rule, \Closure|string $replacer)
 * @method static array validate(array $data, array $rules, array $messages = [], array $customAttributes = [])
 *
 * @see \Fy97Validation\Illuminate\Validation\Factory
 */
class Validator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validator';
    }
}
