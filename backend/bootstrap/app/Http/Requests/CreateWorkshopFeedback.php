<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\ApiResourceDigitIdentifier;
use App\Http\Requests\Traits\KeysToFields;
use App\Repository\ItemRequestRepository;
use App\Repository\ShopFeedbackRepository;
use App\User;
use Illuminate\Container\Container;

class CreateWorkshopFeedback extends ProblemAwareRequest
{
    use ApiResourceDigitIdentifier, KeysToFields;

    /**
     * @var string
     */
    public $workshopId;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $image;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (($workshopId = $this->getModelIdentifier()) === null) {
            return false;
        }

        $this->workshopId = $workshopId;

        /** @var User $user */
        $user = $this->user();

        if (null === $user) {
            return false;
        }

        if ($user->hasRole(User::USER_ROLE_ADMIN)) {
            return true;
        }

        /** @var ShopFeedbackRepository $workshopFeedbackRepository */
        $workshopFeedbackRepository = Container::getInstance()->get(ShopFeedbackRepository::class);
        /** @var ItemRequestRepository $workshopFeedbackRepository */
        $repairRequestRepository = Container::getInstance()->get(ItemRequestRepository::class);

        $dealsCount = $repairRequestRepository->countUserHasRequestsDoneByShopId(
            $user->id,
            $this->workshopId
        );

        $reviewsForThisShopCount = $workshopFeedbackRepository->countShopReviewsForUserId(
            $this->workshopId,
            $user->id
        );

        return $dealsCount > $reviewsForThisShopCount;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|string',
            'image' => 'image64:jpeg,jpg,png|nullable'
        ];
    }
}
