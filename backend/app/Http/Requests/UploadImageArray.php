<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;

class UploadImageArray extends ProblemAwareRequest
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
            'images' => 'required|array|image64array:jpeg,jpg,png'
        ];
    }
}
