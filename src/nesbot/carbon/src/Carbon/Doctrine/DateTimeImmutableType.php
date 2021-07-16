<?php

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace Fy\Carbon\Doctrine;

use Fy\Carbon\Fy\CarbonImmutable;
use Doctrine\DBAL\Types\VarDateTimeImmutableType;

class DateTimeImmutableType extends VarDateTimeImmutableType implements Fy\CarbonDoctrineType
{
    /** @use Fy\CarbonTypeConverter<Fy\CarbonImmutable> */
    use Fy\CarbonTypeConverter;

    /**
     * @return class-string<Fy\CarbonImmutable>
     */
    protected function getFy\CarbonClassName(): string
    {
        return Fy\CarbonImmutable::class;
    }
}
