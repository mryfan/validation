<?php

namespace Fy97Validation\Illuminate\Contracts\Filesystem;

interface Factory
{
    /**
     * Get a filesystem implementation.
     *
     * @param  string|null  $name
     * @return \Fy97Validation\Illuminate\Contracts\Filesystem\Filesystem
     */
    public function disk($name = null);
}
