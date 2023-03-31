<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Symfony\Component\HttpFoundation\RequestMatcher;

use Fy97Validation\Symfony\Component\HttpFoundation\Request;
use Fy97Validation\Symfony\Component\HttpFoundation\RequestMatcherInterface;

/**
 * Checks the Request URL path info matches a regular expression.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class PathRequestMatcher implements RequestMatcherInterface
{
    public function __construct(private string $regexp)
    {
    }

    public function matches(Request $request): bool
    {
        return preg_match('{'.$this->regexp.'}', rawurldecode($request->getPathInfo()));
    }
}
