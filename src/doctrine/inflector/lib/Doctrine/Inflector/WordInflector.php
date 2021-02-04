<?php

declare(strict_types=1);

namespace Fy\Doctrine\Inflector;

interface WordInflector
{
    public function inflect(string $word) : string;
}
