<?php

namespace Fy97Validation\Illuminate\Contracts\Validation;

use Fy97Validation\Illuminate\Contracts\Support\MessageProvider;

interface Validator extends MessageProvider
{
    /**
     * Run the validator's rules against its data.
     *
     * @return array
     *
     * @throws \Fy97Validation\Illuminate\Validation\ValidationException
     */
    public function validate();

    /**
     * Get the attributes and values that were validated.
     *
     * @return array
     *
     * @throws \Fy97Validation\Illuminate\Validation\ValidationException
     */
    public function validated();

    /**
     * Determine if the data fails the validation rules.
     *
     * @return bool
     */
    public function fails();

    /**
     * Get the failed validation rules.
     *
     * @return array
     */
    public function failed();

    /**
     * Add conditions to a given field based on a Closure.
     *
     * @param  string|array  $attribute
     * @param  string|array  $rules
     * @param  callable  $callback
     * @return $this
     */
    public function sometimes($attribute, $rules, callable $callback);

    /**
     * Add an after validation callback.
     *
     * @param  callable|string  $callback
     * @return $this
     */
    public function after($callback);

    /**
     * Get all of the validation error messages.
     *
     * @return \Fy97Validation\Illuminate\Support\MessageBag
     */
    public function errors();
}
