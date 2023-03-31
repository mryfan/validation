<?php

namespace Fy97Validation\Illuminate\Contracts\Container;

use Exception;
use Fy97Validation\Psr\Container\ContainerExceptionInterface;

class CircularDependencyException extends Exception implements ContainerExceptionInterface
{
    //
}
