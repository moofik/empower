<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;

class UpdateSchedule extends ProblemAwareRequest
{
    use AuthorizeWorkshop;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'monday_active' => 'required_with:monday_from|required_with:monday_to|nullable|boolean',
            'monday_from' => 'required_if:monday_active,true|nullable|date_format:"H:i"',
            'monday_to' => 'required_if:monday_active,true|nullable|date_format:"H:i"',
            'tuesday_active' => 'required_with:tuesday_to|required_with:tuesday_from|nullable|boolean',
            'tuesday_from' => 'required_if:tuesday_active,true|nullable|date_format:"H:i"',
            'tuesday_to' => 'required_if:tuesday_active,true|nullable|date_format:"H:i"',
            'wednesday_active' => 'required_with:wednesday_to|required_with:wednesday_from|nullable|boolean',
            'wednesday_from' => 'required_if:wednesday_active,true|nullable|date_format:"H:i"',
            'wednesday_to' => 'required_if:wednesday_active,true|nullable|date_format:"H:i"',
            'thursday_active' => 'required_with:thursday_to|required_with:thursday_from|nullable|boolean',
            'thursday_from' => 'required_if:thursday_active,true|nullable|date_format:"H:i"',
            'thursday_to' => 'required_if:thursday_active,true|nullable|date_format:"H:i"',
            'friday_active' => 'required_with:friday_to|required_with:friday_from|nullable|boolean',
            'friday_from' => 'required_if:friday_active,true|nullable|date_format:"H:i"',
            'friday_to' => 'required_if:friday_active,true|nullable|date_format:"H:i"',
            'saturday_active' => 'required_with:saturday_to|required_with:saturday_from|nullable|boolean',
            'saturday_from' => 'required_if:saturday_active,true|nullable|date_format:"H:i"',
            'saturday_to' => 'required_if:saturday_active,true|nullable|date_format:"H:i"',
            'sunday_active' => 'required_with:sunday_to|required_with:sunday_from|nullable|boolean',
            'sunday_from' => 'required_if:sunday_active,true|nullable|date_format:"H:i"',
            'sunday_to' => 'required_if:sunday_active,true|nullable|date_format:"H:i"',
        ];
    }
}
