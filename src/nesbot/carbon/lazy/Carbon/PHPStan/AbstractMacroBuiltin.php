<?php

declare(strict_types=1);

/**
 * This file is part of the Fy97Validation\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Carbon\PHPStan;

use ReflectionMethod;

if (!class_exists(AbstractReflectionMacro::class, false)) {
    abstract class AbstractReflectionMacro extends AbstractMacro
    {
        /**
         * {@inheritdoc}
         */
        public function getReflection(): ?ReflectionMethod
        {
            return $this->reflectionFunction instanceof ReflectionMethod
                ? $this->reflectionFunction
                : null;
        }
    }
}
