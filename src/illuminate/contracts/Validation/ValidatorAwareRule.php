<?php

namespace Fy97Validation\Illuminate\Contracts\Validation;

use Fy97Validation\Illuminate\Validation\Validator;

interface ValidatorAwareRule
{
    /**
     * Set the current validator.
     *
     * @param  \Fy97Validation\Illuminate\Validation\Validator  $validator
     * @return $this
     */
    public function setValidator(Validator $validator);
}
