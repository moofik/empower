<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeRepairRequestActions;

class RepairRequestRequest extends ProblemAwareRequest
{
    use AuthorizeRepairRequestActions;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
