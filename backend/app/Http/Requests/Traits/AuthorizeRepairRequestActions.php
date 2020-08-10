<?php


namespace App\Http\Requests\Traits;


use App\ItemRequestOffer;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\User;
use Illuminate\Container\Container;

trait AuthorizeRepairRequestActions
{
    use ApiResourceDigitIdentifier;

    /**
     * @var int
     */
    public $repairRequestId;

    /**
     * @var ItemRequestOffer|null
     */
    public $pendingWorkshopOffer;

    /**
     * @var bool
     */
    public $doesUserHaveGivenRepairRequest;

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
        $workshopOffer = $repairRequestOfferRepository->findByItemRequestIdAndWorkshopId($repairRequestId, $user->id);
        $this->pendingWorkshopOffer = $workshopOffer;

        /** @var ItemRequestRepository $repairRequestRepository */
        $repairRequestRepository = Container::getInstance()->get(ItemRequestRepository::class);
        $hasRepairRequest = $repairRequestRepository->findUserOrWorkshopHasRepairRequest($user->id, $repairRequestId);
        $this->doesUserHaveGivenRepairRequest = $hasRepairRequest;

        if ($workshopOffer || $hasRepairRequest) {
            $this->repairRequestId = $repairRequestId;

            return true;
        }

        return false;
    }
}
