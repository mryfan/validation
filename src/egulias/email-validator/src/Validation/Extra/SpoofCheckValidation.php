<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation\Extra;

use \Spoofchecker;
use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\Result\SpoofEmail;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Validation\EmailValidation;

class SpoofCheckValidation implements EmailValidation
{
    /**
     * @var InvalidEmail|null
     */
    private $error;

    public function __construct()
    {
        if (!extension_loaded('intl')) {
            throw new \LogicException(sprintf('The %s class requires the Intl extension.', __CLASS__));
        }
    }

    /**
     * @psalm-suppress InvalidArgument
     */
    public function isValid(string $email, EmailLexer $emailLexer) : bool
    {
        $checker = new Spoofchecker();
        $checker->setChecks(Spoofchecker::SINGLE_SCRIPT);

        if ($checker->isSuspicious($email)) {
            $this->error = new SpoofEmail();
        }

        return $this->error === null;
    }

    /**
     * @return InvalidEmail
     */
    public function getError() : ?InvalidEmail
    {
        return $this->error;
    }

    public function getWarnings() : array
    {
        return [];
    }
}
