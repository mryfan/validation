<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\MessageIDParser;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\ExceptionFound;
use Fy97Validation\Egulias\EmailValidator\Warning\Warning;

class MessageIDValidation implements EmailValidation
{

    /**
     * @var Warning[]
     */
    private $warnings = [];

    /**
     * @var ?InvalidEmail
     */
    private $error;

    public function isValid(string $email, EmailLexer $emailLexer): bool
    {
        $parser = new MessageIDParser($emailLexer);
        try {
            $result = $parser->parse($email);
            $this->warnings = $parser->getWarnings();
            if ($result->isInvalid()) {
                /** @psalm-suppress PropertyTypeCoercion */
                $this->error = $result;
                return false;
            }
        } catch (\Exception $invalid) {
            $this->error = new InvalidEmail(new ExceptionFound($invalid), '');
            return false;
        }

        return true;
    }

    /**
     * @return Warning[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function getError(): ?InvalidEmail
    {
        return $this->error;
    }
}
