<?php

namespace Fy\Illuminate\Contracts\Mail;

interface Factory
{
    /**
     * Get a mailer instance by name.
     *
     * @param  string|null  $name
     * @return \Fy\Illuminate\Contracts\Mail\Mailer
     */
    public function mailer($name = null);
}
