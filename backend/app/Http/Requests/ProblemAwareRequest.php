<?php


namespace App\Http\Requests;


use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class ProblemAwareRequest extends FormRequest
{
    /**
     * @param  Validator  $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $problem = new Problem(400, Problem::TYPE_VALIDATION_ERROR);
        $problem->setDetail($validator->errors()->toArray());
        throw new ProblemException($problem);
    }
}
