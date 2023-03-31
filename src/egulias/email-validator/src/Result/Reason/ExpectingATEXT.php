<?php

namespace Fy97Validation\Egulias\EmailValidator\Result\Reason;

class ExpectingATEXT extends DetailedReason
{
    public function code() : int
    {
        return 137;
    }

    public function description() : string
    {
        return "Expecting ATEXT (Printable US-ASCII). Extended: " . $this->detailedDescription;
    }
}
