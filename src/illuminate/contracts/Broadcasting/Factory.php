<?php

namespace Fy97Validation\Illuminate\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by name.
     *
     * @param  string|null  $name
     * @return \Fy97Validation\Illuminate\Contracts\Broadcasting\Broadcaster
     */
    public function connection($name = null);
}
