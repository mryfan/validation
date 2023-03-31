<?php

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace Fy97Validation\Carbon\Doctrine;

use Fy97Validation\Carbon\Carbon;
use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements Fy97Validation\CarbonDoctrineType
{
    /** @use Fy97Validation\CarbonTypeConverter<Carbon> */
    use Fy97Validation\CarbonTypeConverter;
}
