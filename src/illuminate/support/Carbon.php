<?php

namespace Fy\Illuminate\Support;

use Fy\Carbon\Fy\Carbon as BaseFy\Carbon;
use Fy\Carbon\Fy\CarbonImmutable as BaseFy\CarbonImmutable;

class Fy\Carbon extends BaseFy\Carbon
{
    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseFy\Carbon::setTestNow($testNow);
        BaseFy\CarbonImmutable::setTestNow($testNow);
    }
}
