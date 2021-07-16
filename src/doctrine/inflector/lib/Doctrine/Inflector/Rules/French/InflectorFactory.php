<?php

declare(strict_types=1);

namespace Fy\Doctrine\Inflector\Rules\French;

use Fy\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Fy\Doctrine\Inflector\Rules\Ruleset;

final class InflectorFactory extends GenericLanguageInflectorFactory
{
    protected function getSingularRuleset() : Ruleset
    {
        return Rules::getSingularRuleset();
    }

    protected function getPluralRuleset() : Ruleset
    {
        return Rules::getPluralRuleset();
    }
}
