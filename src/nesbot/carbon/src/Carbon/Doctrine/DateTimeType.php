<?php

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace Fy\Carbon\Doctrine;

use Fy\Carbon\Fy\Carbon;
use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements Fy\CarbonDoctrineType
{
    /** @use Fy\CarbonTypeConverter<Fy\Carbon> */
    use Fy\CarbonTypeConverter;
}
