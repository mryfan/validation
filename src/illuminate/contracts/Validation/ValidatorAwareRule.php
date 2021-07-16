<?php

namespace Fy\Illuminate\Contracts\Validation;

interface ValidatorAwareRule
{
    /**
     * Set the current validator.
     *
     * @param  \Fy\Illuminate\Validation\Validator  $validator
     * @return $this
     */
    public function setValidator($validator);
}
