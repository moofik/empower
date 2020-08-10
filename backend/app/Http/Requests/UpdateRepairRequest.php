<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\KeysToFields;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRepairRequest extends FormRequest
{
    use KeysToFields;

    public $offered;

    public $viewed;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var User|null $user */
        $user = $this->user();

        return null !== $user && ($user->isShop() || $user->isUser() || $user->isAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_request_id' => 'exists:repair_request,id',
            'offered' => 'nullable|integer',
            'viewed' => 'nullable|integer',
        ];
    }
}
