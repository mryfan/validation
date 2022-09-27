<?php

namespace Fy97Validation\Illuminate\Contracts\Mail;

interface Factory
{
    /**
     * Get a mailer instance by name.
     *
     * @param  string|null  $name
     * @return \Fy97Validation\Illuminate\Contracts\Mail\Mailer
     */
    public function mailer($name = null);
}
