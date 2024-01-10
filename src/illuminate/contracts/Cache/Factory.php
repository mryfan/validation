<?php

namespace Fy97Validation\Illuminate\Contracts\Cache;

interface Factory
{
    /**
     * Get a cache store instance by name.
     *
     * @param  string|null  $name
     * @return \Fy97Validation\Illuminate\Contracts\Cache\Repository
     */
    public function store($name = null);
}
