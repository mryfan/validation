<?php

/**
 * This file is part of the Fy97Validation\Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fy97Validation\Carbon\Exceptions;

use Fy97Validation\Carbon\CarbonInterface;
use InvalidArgumentException as BaseInvalidArgumentException;
use Throwable;

class NotACarbonClassException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
     * The className.
     *
     * @var string
     */
    protected $className;

    /**
     * Constructor.
     *
     * @param string         $className
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($className, $code = 0, Throwable $previous = null)
    {
        $this->className = $className;

        parent::__construct(sprintf('Given class does not implement %s: %s', Fy97Validation\CarbonInterface::class, $className), $code, $previous);
    }

    /**
     * Get the className.
     *
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }
}
