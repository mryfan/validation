<?php

namespace Fy97Validation\Illuminate\Contracts\Auth;

interface PasswordBrokerFactory
{
    /**
     * Get a password broker instance by name.
     *
     * @param  string|null  $name
     * @return \Fy97Validation\Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker($name = null);
}
