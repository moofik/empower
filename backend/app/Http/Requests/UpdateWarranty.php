<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;

class UpdateWarranty extends ProblemAwareRequest
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
            'job_warranty_months' => 'required_with:job_warranty_driven|nullable|integer',
            'job_warranty_driven' => 'required_with:job_warranty_months|nullable|integer',
            'assemblies_warranty_months' => 'required_with:assemblies_warranty_driven|nullable|integer',
            'assemblies_warranty_driven' => 'required_with:assemblies_warranty_months|nullable|integer',
            'additional_info' => 'nullable|string',
        ];
    }
}
