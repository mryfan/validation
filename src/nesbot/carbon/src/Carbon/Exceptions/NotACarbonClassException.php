<?php

/**
 * This file is part of the Fy\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Fy\Carbon\Exceptions;

use Fy\Carbon\Fy\CarbonInterface;
use Exception;
use InvalidArgumentException as BaseInvalidArgumentException;

class NotAFy\CarbonClassException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string         $className
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($className, $code = 0, Exception $previous = null)
    {
        parent::__construct(sprintf(
            'Given class does not implement %s: %s',
            Fy\CarbonInterface::class,
            $className
        ), $code, $previous);
    }
}
