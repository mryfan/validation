<?php

namespace Fy97Validation\Illuminate\Support;

use Fy97Validation\Carbon\Carbon as BaseCarbon;
use Fy97Validation\Carbon\CarbonImmutable as BaseCarbonImmutable;

class Fy97Validation\Carbon extends BaseCarbon
{
    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseCarbon::setTestNow($testNow);
        BaseCarbonImmutable::setTestNow($testNow);
    }
}
