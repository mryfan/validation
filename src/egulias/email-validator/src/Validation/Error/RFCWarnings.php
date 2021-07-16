<?php

namespace Fy\Egulias\EmailValidator\Validation\Error;

use Fy\Egulias\EmailValidator\Exception\InvalidEmail;

class RFCWarnings extends InvalidEmail
{
    const CODE = 997;
    const REASON = 'Warnings were found.';
}
