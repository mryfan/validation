<?php

namespace Fy97Validation\Egulias\EmailValidator\Warning;

use Fy97Validation\Egulias\EmailValidator\EmailParser;

class EmailTooLong extends Warning
{
    public const CODE = 66;

    public function __construct()
    {
        $this->message = 'Email is too long, exceeds ' . EmailParser::EMAIL_MAX_LENGTH;
    }
}
