<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Warning\Warning;

interface EmailValidation
{
    /**
     * Returns true if the given email is valid.
     *
     * @param string     $email      The email you want to validate.
     * @param EmailLexer $emailLexer The email lexer.
     *
     * @return bool
     */
    public function isValid(string $email, EmailLexer $emailLexer) : bool;

    /**
     * Returns the validation error.
     *
     * @return InvalidEmail|null
     */
    public function getError() : ?InvalidEmail;

    /**
     * Returns the validation warnings.
     *
     * @return Warning[]
     */
    public function getWarnings() : array;
}
