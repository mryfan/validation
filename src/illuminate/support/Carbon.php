<?php

namespace Fy97Validation\Illuminate\Support;

use Fy97Validation\Carbon\Carbon as BaseCarbon;
use Fy97Validation\Carbon\CarbonImmutable as BaseCarbonImmutable;
use Fy97Validation\Illuminate\Support\Traits\Conditionable;

class Fy97Validation\Carbon extends BaseCarbon
{
    use Conditionable;

    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseCarbon::setTestNow($testNow);
        BaseCarbonImmutable::setTestNow($testNow);
    }
}
