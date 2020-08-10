<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeRepairRequestActions;
use App\Rating;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RateWorkshopRequest extends FormRequest
{
    use AuthorizeRepairRequestActions {
        AuthorizeRepairRequestActions::authorize as preconditionalChecking;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var User $user */
        $user = $this->user();

        if(!$this->preconditionalChecking() || !$user->hasRole([User::USER_ROLE_USER])) {
            return false;
        }

        if ($this->hasBeenRatedForRequest($user->id, $this->repairRequestId)) {
            return false;
        }

        return true;
    }

    private function hasBeenRatedForRequest(int $userId, int $repairRequestId)
    {
        $ratingsCount = Rating::where('customer_id', $userId)
            ->where('item_request_id', $repairRequestId)
            ->count();

        return $ratingsCount > 0 ? true : false;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required|numeric|min:1|max:5'
        ];
    }
}
