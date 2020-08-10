<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;
use App\Http\Requests\Traits\KeysToFields;

class CreateRepairRequest extends ProblemAwareRequest
{
    use AuthorizeWorkshop, KeysToFields {
        KeysToFields::passedValidation as keysToFields;
    }

    /**
     * @var int
     */
    public $makeId;

    /**
     * @var int
     */
    public $serviceId;

    /**
     * @var int
     */
    public $sparePartId;

    /**
     * @var string
     */
    public $drive;

    /**
     * @var string
     */
    public $registrationNumber;

    /**
     * @var string
     */
    public $howFastTime;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $description;

    protected function passedValidation()
    {
        $this->keysToFields();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'make_id' => 'exists:shop_make,id',
            'service_id' => 'exists:shop_service,id',
            'spare_part_id' => 'exists:shop_spare_parts,id',
            'drive' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'how_fast_time' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }
}
