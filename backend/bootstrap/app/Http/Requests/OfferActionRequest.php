<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeWorkshopOfferActions;
use Illuminate\Foundation\Http\FormRequest;

class OfferActionRequest extends FormRequest
{
    use AuthorizeWorkshopOfferActions;

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
