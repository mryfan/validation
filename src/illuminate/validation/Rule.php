<?php

namespace Fy97Validation\Illuminate\Validation;

use Fy97Validation\Illuminate\Contracts\Support\Arrayable;
use Fy97Validation\Illuminate\Support\Traits\Macroable;
use Fy97Validation\Illuminate\Validation\Rules\Dimensions;
use Fy97Validation\Illuminate\Validation\Rules\Enum;
use Fy97Validation\Illuminate\Validation\Rules\ExcludeIf;
use Fy97Validation\Illuminate\Validation\Rules\Exists;
use Fy97Validation\Illuminate\Validation\Rules\File;
use Fy97Validation\Illuminate\Validation\Rules\ImageFile;
use Fy97Validation\Illuminate\Validation\Rules\In;
use Fy97Validation\Illuminate\Validation\Rules\NotIn;
use Fy97Validation\Illuminate\Validation\Rules\ProhibitedIf;
use Fy97Validation\Illuminate\Validation\Rules\RequiredIf;
use Fy97Validation\Illuminate\Validation\Rules\Unique;

class Rule
{
    use Macroable;

    /**
     * Create a new conditional rule set.
     *
     * @param  callable|bool  $condition
     * @param  array|string|\Closure  $rules
     * @param  array|string|\Closure  $defaultRules
     * @return \Fy97Validation\Illuminate\Validation\ConditionalRules
     */
    public static function when($condition, $rules, $defaultRules = [])
    {
        return new ConditionalRules($condition, $rules, $defaultRules);
    }

    /**
     * Create a new nested rule set.
     *
     * @param  callable  $callback
     * @return \Fy97Validation\Illuminate\Validation\NestedRules
     */
    public static function forEach($callback)
    {
        return new NestedRules($callback);
    }

    /**
     * Get a unique constraint builder instance.
     *
     * @param  string  $table
     * @param  string  $column
     * @return \Fy97Validation\Illuminate\Validation\Rules\Unique
     */
    public static function unique($table, $column = 'NULL')
    {
        return new Unique($table, $column);
    }

    /**
     * Get an exists constraint builder instance.
     *
     * @param  string  $table
     * @param  string  $column
     * @return \Fy97Validation\Illuminate\Validation\Rules\Exists
     */
    public static function exists($table, $column = 'NULL')
    {
        return new Exists($table, $column);
    }

    /**
     * Get an in constraint builder instance.
     *
     * @param  \Fy97Validation\Illuminate\Contracts\Support\Arrayable|array|string  $values
     * @return \Fy97Validation\Illuminate\Validation\Rules\In
     */
    public static function in($values)
    {
        if ($values instanceof Arrayable) {
            $values = $values->toArray();
        }

        return new In(is_array($values) ? $values : func_get_args());
    }

    /**
     * Get a not_in constraint builder instance.
     *
     * @param  \Fy97Validation\Illuminate\Contracts\Support\Arrayable|array|string  $values
     * @return \Fy97Validation\Illuminate\Validation\Rules\NotIn
     */
    public static function notIn($values)
    {
        if ($values instanceof Arrayable) {
            $values = $values->toArray();
        }

        return new NotIn(is_array($values) ? $values : func_get_args());
    }

    /**
     * Get a required_if constraint builder instance.
     *
     * @param  callable|bool  $callback
     * @return \Fy97Validation\Illuminate\Validation\Rules\RequiredIf
     */
    public static function requiredIf($callback)
    {
        return new RequiredIf($callback);
    }

    /**
     * Get a exclude_if constraint builder instance.
     *
     * @param  callable|bool  $callback
     * @return \Fy97Validation\Illuminate\Validation\Rules\ExcludeIf
     */
    public static function excludeIf($callback)
    {
        return new ExcludeIf($callback);
    }

    /**
     * Get a prohibited_if constraint builder instance.
     *
     * @param  callable|bool  $callback
     * @return \Fy97Validation\Illuminate\Validation\Rules\ProhibitedIf
     */
    public static function prohibitedIf($callback)
    {
        return new ProhibitedIf($callback);
    }

    /**
     * Get an enum constraint builder instance.
     *
     * @param  string  $type
     * @return \Fy97Validation\Illuminate\Validation\Rules\Enum
     */
    public static function enum($type)
    {
        return new Enum($type);
    }

    /**
     * Get a file constraint builder instance.
     *
     * @return \Fy97Validation\Illuminate\Validation\Rules\File
     */
    public static function file()
    {
        return new File;
    }

    /**
     * Get an image file constraint builder instance.
     *
     * @return \Fy97Validation\Illuminate\Validation\Rules\ImageFile
     */
    public static function imageFile()
    {
        return new ImageFile;
    }

    /**
     * Get a dimensions constraint builder instance.
     *
     * @param  array  $constraints
     * @return \Fy97Validation\Illuminate\Validation\Rules\Dimensions
     */
    public static function dimensions(array $constraints = [])
    {
        return new Dimensions($constraints);
    }
}
