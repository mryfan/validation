<?php

namespace Fy97Validation\Egulias\EmailValidator\Warning;

class AddressLiteral extends Warning
{
    const CODE = 12;

    public function __construct()
    {
        $this->message = 'Address literal in domain part';
        $this->rfcNumber = 5321;
    }
}
