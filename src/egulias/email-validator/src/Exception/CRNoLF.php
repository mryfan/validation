<?php

namespace Fy97Validation\Egulias\EmailValidator\Exception;

class CRNoLF extends InvalidEmail
{
    const CODE = 150;
    const REASON = "Missing LF after CR";
}
