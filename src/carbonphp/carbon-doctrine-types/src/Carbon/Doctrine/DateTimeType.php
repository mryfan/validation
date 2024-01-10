<?php

namespace Fy97Validation\Carbon\Doctrine;

use Fy97Validation\Carbon\Carbon;
use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements Fy97Validation\CarbonDoctrineType
{
    /** @use Fy97Validation\CarbonTypeConverter<Carbon> */
    use Fy97Validation\CarbonTypeConverter;
}
