<?php


namespace App\Validator;


use Illuminate\Contracts\Validation\Factory as Validator;

interface ValidatorRulesExtender
{
    public function extend(Validator $validator): void;
}
