<?php

namespace Fy97Validation\Illuminate\Support\Traits;

trait Tappable
{
    /**
     * Call the given Closure with this instance then return the instance.
     *
     * @param  callable|null  $callback
     * @return $this|\Illuminate\Support\HigherOrderTapProxy
     */
    public function tap($callback = null)
    {
        return \Fy97Validation\Illuminate\Support\helpers1_new::tap($this, $callback);
    }
}
