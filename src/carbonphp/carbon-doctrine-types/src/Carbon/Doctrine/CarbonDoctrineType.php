<?php

namespace Fy97Validation\Carbon\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;

interface Fy97Validation\CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);

    public function convertToPHPValue($value, AbstractPlatform $platform);

    public function convertToDatabaseValue($value, AbstractPlatform $platform);
}
