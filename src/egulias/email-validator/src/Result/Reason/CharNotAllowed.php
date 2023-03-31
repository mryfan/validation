<?php

namespace Fy97Validation\Egulias\EmailValidator\Result\Reason;

class CharNotAllowed implements Reason
{
    public function code() : int
    {
        return 1;
    }

    public function description() : string
    {
        return "Character not allowed";
    }
}