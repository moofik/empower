<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;
use App\Http\Requests\Traits\KeysToFields;

class UpdateEmail extends ProblemAwareRequest
{
    use AuthorizeWorkshop, KeysToFields;

    /**
     * @var string
     */
    public $email;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'email:rfc,dns|unique:users,email'
        ];
    }
}
