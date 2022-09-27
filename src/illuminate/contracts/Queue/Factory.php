<?php

namespace Fy97Validation\Illuminate\Contracts\Queue;

interface Factory
{
    /**
     * Resolve a queue connection instance.
     *
     * @param  string|null  $name
     * @return \Fy97Validation\Illuminate\Contracts\Queue\Queue
     */
    public function connection($name = null);
}
