<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\ProblemAwareRequest;
use App\Http\Requests\Traits\KeysToFields;

class CreateUser extends ProblemAwareRequest
{
    use KeysToFields;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string
     */
    public $city;

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
            'email' => 'required|string|max:255|unique:users|email',
            'password' => 'required|string|min:6',
            'full_name' => 'required|string|max:255',
            'city' => 'required|string|max:255'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'city' => $this->city,
            'full_name' => $this->fullName,
        ];
    }
}
