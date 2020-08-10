<?php

namespace App\Http\Requests;

class AuthenticationUser extends ProblemAwareRequest
{
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    protected function passedValidation()
    {
        $this->username = $this->get('username');
        $this->password = $this->get('password');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return null === $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|max:255|email',
            'password' => 'required|string|min:6',
        ];
    }
}
