<?php

namespace Fy97Validation\Egulias\EmailValidator\Exception;

class CRLFAtTheEnd extends InvalidEmail
{
    const CODE = 149;
    const REASON = "CRLF at the end";
}
