<?php

namespace App\Services\Validators;

class RegisterValidator extends Validator {

    public static $rules = array(
        'username' => 'required|unique:users',
        'password' => 'required|min:5'
    );

}