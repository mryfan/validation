<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\RFCWarnings;

class NoRFCWarningsValidation extends RFCValidation
{
    /**
     * @var InvalidEmail|null
     */
    private $error;

    /**
     * {@inheritdoc}
     */
    public function isValid(string $email, EmailLexer $emailLexer) : bool
    {
        if (!parent::isValid($email, $emailLexer)) {
            return false;
        }

        if (empty($this->getWarnings())) {
            return true;
        }

        $this->error = new InvalidEmail(new RFCWarnings(), '');

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getError() : ?InvalidEmail
    {
        return $this->error ?: parent::getError();
    }
}
