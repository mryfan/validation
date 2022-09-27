<?php

namespace Fy97Validation\Egulias\EmailValidator\Validation;

use Fy97Validation\Egulias\EmailValidator\Exception\InvalidEmail;

class MultipleErrors extends InvalidEmail
{
    const CODE = 999;
    const REASON = "Accumulated errors for multiple validations";
    /**
     * @var InvalidEmail[]
     */
    private $errors = [];

    /**
     * @param InvalidEmail[] $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct();
    }

    /**
     * @return InvalidEmail[]
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
