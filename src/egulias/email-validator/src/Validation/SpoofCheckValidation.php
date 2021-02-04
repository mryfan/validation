<?php

namespace Fy\Egulias\EmailValidator\Validation;

use Fy\Egulias\EmailValidator\EmailLexer;
use Fy\Egulias\EmailValidator\Exception\InvalidEmail;
use Fy\Egulias\EmailValidator\Validation\Error\SpoofEmail;
use \Spoofchecker;

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
    public function isValid($email, EmailLexer $emailLexer)
    {
        $checker = new Spoofchecker();
        $checker->setChecks(Spoofchecker::SINGLE_SCRIPT);

        if ($checker->isSuspicious($email)) {
            $this->error = new SpoofEmail();
        }

        return $this->error === null;
    }

    /**
     * @return InvalidEmail|null
     */
    public function getError()
    {
        return $this->error;
    }

    public function getWarnings()
    {
        return [];
    }
}
