<?php

namespace Fy97Validation\Egulias\EmailValidator\Exception;

class ExpectingAT extends InvalidEmail
{
    const CODE = 202;
    const REASON = "Expecting AT '@' ";
}
