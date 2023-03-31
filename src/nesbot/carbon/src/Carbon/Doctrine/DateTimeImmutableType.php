<?php

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace Fy97Validation\Carbon\Doctrine;

use Fy97Validation\Carbon\CarbonImmutable;
use Doctrine\DBAL\Types\VarDateTimeImmutableType;

class DateTimeImmutableType extends VarDateTimeImmutableType implements Fy97Validation\CarbonDoctrineType
{
    /** @use Fy97Validation\CarbonTypeConverter<CarbonImmutable> */
    use Fy97Validation\CarbonTypeConverter;

    /**
     * @return class-string<CarbonImmutable>
     */
    protected function getCarbonClassName(): string
    {
        return Fy97Validation\CarbonImmutable::class;
    }
}
