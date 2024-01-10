<?php

namespace Fy97Validation\Egulias\EmailValidator\Exception;

class DotAtStart extends InvalidEmail
{
    const CODE = 141;
    const REASON = "Found DOT at start";
}
