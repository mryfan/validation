<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Symfony\Component\HttpFoundation\File\Exception;

class UnexpectedTypeException extends FileException
{
    public function __construct($value, string $expectedType)
    {
        parent::__construct(sprintf('Expected argument of type %s, %s given', $expectedType, \Fy97Validation\Symfony\Polyfill\Php80\bootstrap_new::get_debug_type($value)));
    }
}
