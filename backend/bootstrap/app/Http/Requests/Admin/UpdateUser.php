<?php

namespace App\Http\Requests\Admin;


class UpdateUser extends CreateUser
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|min:6',
            'full_name' => 'required|string|max:255',
            'city' => 'required|string|max:255'
        ];
    }
}
