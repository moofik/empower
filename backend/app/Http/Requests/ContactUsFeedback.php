<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\KeysToFields;

class ContactUsFeedback extends ProblemAwareRequest
{
    use KeysToFields;

    public $name;

    public $email;

    public $phone;

    public $message;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'message' => 'required|string|max:1500',
        ];
    }
}
