<?php

namespace App\Http\Requests;


use App\Http\Requests\Traits\AuthorizeWorkshop;

class UploadImage extends ProblemAwareRequest
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
            'image' => 'required|image64:jpeg,jpg,png'
        ];
    }
}
