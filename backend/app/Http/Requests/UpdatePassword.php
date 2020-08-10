<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;
use App\Http\Requests\Traits\KeysToFields;

class UpdatePassword extends ProblemAwareRequest
{
    use AuthorizeWorkshop, KeysToFields;

    public $oldPassword;

    public $password;

    public $passwordConfirmation;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|password:api',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password'
        ];
    }
}
