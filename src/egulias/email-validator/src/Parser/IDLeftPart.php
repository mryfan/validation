<?php

namespace Fy97Validation\Egulias\EmailValidator\Parser;

use Fy97Validation\Egulias\EmailValidator\Result\Result;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\CommentsInIDRight;

class IDLeftPart extends LocalPart
{
    protected function parseComments(): Result
    {
        return new InvalidEmail(new CommentsInIDRight(), $this->lexer->current->value);
    }
}
