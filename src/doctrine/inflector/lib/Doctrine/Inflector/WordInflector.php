<?php

declare(strict_types=1);

namespace Fy97Validation\Doctrine\Inflector;

interface WordInflector
{
    public function inflect(string $word): string;
}
