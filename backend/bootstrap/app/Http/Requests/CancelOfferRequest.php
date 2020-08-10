<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\AuthorizeRepairRequestActions;
use App\Repository\ItemRequestRepository;
use App\User;
use Illuminate\Container\Container;
use Illuminate\Foundation\Http\FormRequest;

class CancelOfferRequest extends FormRequest
{
    use AuthorizeRepairRequestActions {
        AuthorizeRepairRequestActions::authorize as authorizeRepairRequestActions;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!$this->authorizeRepairRequestActions()) {
            return false;
        }

        /** @var User $user */
        $user = $this->user();

        /** @var ItemRequestRepository $repairRequestRepository */
        $repairRequestRepository = Container::getInstance()->get(ItemRequestRepository::class);

        if ($repairRequestRepository->findWorkshopHasRepairRequest($user->id, $this->repairRequestId)) {
            return false;
        }

        return true;
    }

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
