<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeWorkshop;
use App\Http\Requests\Traits\KeysToFields;
use DateTime;

class UpdateBasicSettings extends ProblemAwareRequest
{
    use AuthorizeWorkshop, KeysToFields {
        KeysToFields::passedValidation as keysToFields;
    }

    /**
     * @var string
     */
    public $shopName;

    /**
     * @var string
     */
    public $shopAddress;

    /**
     * @var string
     */
    public $companyName;

    /**
     * @var string
     */
    public $zipCode;

    /**
     * @var string
     */
    public $businessId;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $shopPhone;

    /**
     * @var int|null
     */
    public $employee;

    /**
     * @var DateTime|null
     */
    public $founded;

    protected function passedValidation()
    {
        $this->keysToFields();

        if ($this->get('founded')) {
            $this->founded = DateTime::createFromFormat('Y', $this->get('founded'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_name' => 'required|string|max:255',
            'shop_address' => 'required|string|max:255',
            'shop_phone' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'business_id' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'employee' => 'nullable|integer|digits_between:1,4',
            'founded' => 'nullable|integer|between:1920,2019',
        ];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'shop_name' => $this->shopName,
            'shop_address' => $this->shopAddress,
            'shop_phone' => $this->shopPhone,
            'company_name' => $this->companyName,
            'zip_code' => $this->zipCode,
            'business_id' => $this->businessId,
            'city' => $this->city,
            'employee' => $this->employee,
            'founded' => $this->founded,
        ];
    }
}
