<?php

namespace Fy\Illuminate\Contracts\Support;

interface DeferringDisplayableValue
{
    /**
     * Resolve the displayable value that the class is deferring.
     *
     * @return \Fy\Illuminate\Contracts\Support\Htmlable|string
     */
    public function resolveDisplayableValue();
}
