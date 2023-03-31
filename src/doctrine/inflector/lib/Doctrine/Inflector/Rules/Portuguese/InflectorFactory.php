<?php

declare(strict_types=1);

namespace Fy97Validation\Doctrine\Inflector\Rules\Portuguese;

use Fy97Validation\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Fy97Validation\Doctrine\Inflector\Rules\Ruleset;

final class InflectorFactory extends GenericLanguageInflectorFactory
{
    protected function getSingularRuleset(): Ruleset
    {
        return Rules::getSingularRuleset();
    }

    protected function getPluralRuleset(): Ruleset
    {
        return Rules::getPluralRuleset();
    }
}
