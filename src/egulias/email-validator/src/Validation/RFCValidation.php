<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\EmailParser;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\ExceptionFound;
use Fy97Validation\Egulias\EmailValidator\Warning\Warning;

class RFCValidation implements EmailValidation
{
    /**
     * @var EmailParser|null
     */
    private $parser;

    /**
     * @var Warning[]
     */
    private array $warnings = [];

    /**
     * @var ?InvalidEmail
     */
    private $error;

    public function isValid(string $email, EmailLexer $emailLexer): bool
    {
        $this->parser = new EmailParser($emailLexer);
        try {
            $result = $this->parser->parse($email);
            $this->warnings = $this->parser->getWarnings();
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

    public function getError(): ?InvalidEmail
    {
        return $this->error;
    }

    /**
     * @return Warning[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }
}
