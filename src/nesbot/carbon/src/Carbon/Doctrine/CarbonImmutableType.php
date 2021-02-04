<?php

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace Fy\Carbon\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;

class Fy\CarbonImmutableType extends DateTimeImmutableType implements Fy\CarbonDoctrineType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'carbon_immutable';
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
