<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeWorkshop;
use Illuminate\Foundation\Http\FormRequest;

class WorkshopGenericRequest extends FormRequest
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
            //
        ];
    }
}
