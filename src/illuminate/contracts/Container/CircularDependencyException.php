<?php

namespace Fy\Illuminate\Contracts\Container;

use Exception;
use Fy\Psr\Container\ContainerExceptionInterface;

class CircularDependencyException extends Exception implements ContainerExceptionInterface
{
    //
}
