<?php

namespace Fy97Validation\Illuminate\Contracts\Support;

interface DeferringDisplayableValue
{
    /**
     * Resolve the displayable value that the class is deferring.
     *
     * @return \Fy97Validation\Illuminate\Contracts\Support\Htmlable|string
     */
    public function resolveDisplayableValue();
}
