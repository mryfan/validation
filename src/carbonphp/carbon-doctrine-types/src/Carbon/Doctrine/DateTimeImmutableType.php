<?php

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
