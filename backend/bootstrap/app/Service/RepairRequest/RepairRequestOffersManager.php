<?php


namespace App\Service\RepairRequest;


use App\ItemRequest;
use App\ItemRequestOffer;
use App\Repository\ItemRequestOfferRepository;
use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\User;
use Exception;

class RepairRequestOffersManager
{
    /**
     * @var ItemRequestOfferRepository
     */
    private $repairRequestOfferRepository;

    /**
     * RepairRequestOffersManager constructor.
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     */
    public function __construct(ItemRequestOfferRepository $repairRequestOfferRepository)
    {
        $this->repairRequestOfferRepository = $repairRequestOfferRepository;
    }

    /**
     * @param User $user
     * @param ItemRequest $repairRequest
     * @return ItemRequestOffer
     */
    public function addUniqueOffer(User $user, ItemRequest $repairRequest): ItemRequestOffer
    {
        $repairRequestOffer = $repairRequest
            ->itemRequestOffers()
            ->where('workshop_id', '=', $user->id)
            ->where('repair_request_id', '=', $repairRequest->id)
            ->first();

        if (null === $repairRequestOffer) {
            $repairRequestOffer = new ItemRequestOffer();
            $repairRequestOffer->shop()->associate($user);
            $repairRequestOffer->itemRequest()->associate($repairRequest);
            $repairRequest->itemRequestOffers()->save($repairRequestOffer);
        }

        return $repairRequestOffer;
    }

    /**
     * @param ItemRequest $repairRequest
     * @return int
     */
    public function getOffersCountThroughRelation(ItemRequest $repairRequest): int
    {
        return $repairRequest->itemRequestOffers->count();
    }

    /**
     * @param int $repairRequestId
     * @param int $workshopId
     */
    public function deleteOffer(int $repairRequestId, int $workshopId)
    {
        try {
            $this
                ->repairRequestOfferRepository
                ->deleteByItemRequestIdAndWorkshopId($repairRequestId, $workshopId);
        } catch (Exception $e) {
            $problem = new Problem(500);
            $problem->setDetail($e->getMessage());
            throw new ProblemException($problem);
        }
    }

    /**
     * Mark repair request as closed (it means either workshop has done repair job successfully or customer and shop have disagreements.
     * In a case of disagreements user can open a dispute.
     * @param int $repairRequestId
     */
    public function closeOffer(int $repairRequestId): void
    {
        try {
            /** @var ItemRequest|null $repairRequest */
            $repairRequest = ItemRequest::find($repairRequestId);

            if (null === $repairRequest) {
                $problem = new Problem(404);
                $problem->setDetail(sprintf('Repair request with id %d not found.', $repairRequestId));
                throw new ProblemException($problem);
            }

            $repairRequest->is_closed = true;
            $repairRequest->save();
        } catch (Exception $e) {
            $problem = new Problem(500);
            $problem->setDetail($e->getMessage());
            throw new ProblemException($problem);
        }
    }
}
