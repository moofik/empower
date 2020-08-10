<?php


namespace App\Http\Requests\Traits;


use App\ItemRequestOffer;
use App\Repository\ItemRequestOfferRepository;
use App\User;
use Illuminate\Container\Container;

trait AuthorizeWorkshopOfferActions
{
    use ApiResourceDigitIdentifier;

    /**
     * @var int
     */
    public $offerId;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (($repairRequestId = $this->getModelIdentifier()) === null) {
            return false;
        }

        /** @var User $user */
        $user = $this->user();

        if (!$user) {
            return false;
        }

        /** @var ItemRequestOfferRepository $repairRequestOfferRepository */
        $repairRequestOfferRepository = Container::getInstance()->get(ItemRequestOfferRepository::class);
        /** @var ItemRequestOffer $offer */
        $offer = $repairRequestOfferRepository->findByItemRequestIdAndUserId($repairRequestId, $user->id);

        if ($offer) {
            $this->offerId = $repairRequestId;

            return true;
        }

        return false;
    }
}
