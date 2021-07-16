<?php

namespace Fy\Illuminate\Contracts\Cache;

interface Factory
{
    /**
     * Get a cache store instance by name.
     *
     * @param  string|null  $name
     * @return \Fy\Illuminate\Contracts\Cache\Repository
     */
    public function store($name = null);
}
