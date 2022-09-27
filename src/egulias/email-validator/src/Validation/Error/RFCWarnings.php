<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation\Error;

use Fy97Validation\Egulias\EmailValidator\Exception\InvalidEmail;

class RFCWarnings extends InvalidEmail
{
    const CODE = 997;
    const REASON = 'Warnings were found.';
}
