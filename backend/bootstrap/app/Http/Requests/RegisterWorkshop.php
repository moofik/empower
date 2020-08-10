<?php

namespace App\Http\Requests;

class registerShop extends ProblemAwareRequest
{
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
    public $workshopName;

    /**
     * @var string
     */
    public $workshopAddress;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string
     */
    public $city;

    protected function passedValidation()
    {
        $this->email = $this->get('email');
        $this->password = $this->get('password');
        $this->workshopName = $this->get('workshop_name');
        $this->workshopAddress = $this->get('workshop_address');
        $this->fullName = $this->get('full_name');
        $this->city = $this->get('city');
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
            'email' => 'required|string|max:255|unique:users|email',
            'password' => 'required|string|min:6',
            'workshop_name' => 'required|string|max:255',
            'workshop_address' => 'required|string|max:255',
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
            'workshop_name' => $this->workshopName,
            'workshop_address' => $this->workshopAddress,
            'city' => $this->city,
            'full_name' => $this->fullName,
        ];
    }
}
