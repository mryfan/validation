<?php

namespace Fy97Validation\Egulias\EmailValidator\Exception;

class NoDNSRecord extends InvalidEmail
{
    const CODE = 5;
    const REASON = 'No MX or A DSN record was found for this email';
}
