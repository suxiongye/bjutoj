<?php

namespace App\Services\Validators;

class CodeValidator extends Validator {

    public static $rules = array(
        'content' => 'required',
    );

}