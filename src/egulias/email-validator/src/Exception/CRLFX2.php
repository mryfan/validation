<?php

namespace Fy97Validation\Egulias\EmailValidator\Exception;

class CRLFX2 extends InvalidEmail
{
    const CODE = 148;
    const REASON = "Folding whitespace CR LF found twice";
}
