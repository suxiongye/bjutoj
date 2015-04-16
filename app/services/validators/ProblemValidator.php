<?php

namespace App\Services\Validators;

class ProblemValidator extends Validator {

    public static $rules = array(
        'title' => 'required',
        'content'  => 'required',
        'outputcase'=>'required',
        'timelimit'=>'required',
        'memorylimit'=>'required'
    );

}