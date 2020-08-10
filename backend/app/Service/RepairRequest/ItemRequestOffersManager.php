<?php


namespace App\Service\RepairRequest;


use App\ItemRequest;
use App\ItemRequestOffer;
use App\Repository\ItemRequestOfferRepository;
use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\User;
use Exception;

class ItemRequestOffersManager
{
    /**
     * @var ItemRequestOfferRepository
     */
    private $itemRequestOfferRepository;

    /**
     * RepairRequestOffersManager constructor.
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     */
    public function __construct(ItemRequestOfferRepository $repairRequestOfferRepository)
    {
        $this->itemRequestOfferRepository = $repairRequestOfferRepository;
    }

    /**
     * @param User $user
     * @param ItemRequest $repairRequest
     * @return ItemRequestOffer
     */
    public function addUniqueOffer(User $user, ItemRequest $repairRequest): ItemRequestOffer
    {
        $itemRequestOffer = $repairRequest
            ->itemRequestOffers()
            ->where('shop_id', '=', $user->id)
            ->where('item_request_id', '=', $repairRequest->id)
            ->first();

        if (null === $itemRequestOffer) {
            $itemRequestOffer = new ItemRequestOffer();
            $itemRequestOffer->shop()->associate($user);
            $itemRequestOffer->itemRequest()->associate($repairRequest);
            $repairRequest->itemRequestOffers()->save($itemRequestOffer);
        }

        return $itemRequestOffer;
    }

    /**
     * @param ItemRequest $itemRequest
     * @return int
     */
    public function getOffersCountThroughRelation(ItemRequest $itemRequest): int
    {
        return $itemRequest->itemRequestOffers->count();
    }

    /**
     * @param int $itemRequestId
     * @param int $workshopId
     */
    public function deleteOffer(int $itemRequestId, int $workshopId)
    {
        try {
            $this
                ->itemRequestOfferRepository
                ->deleteByItemRequestIdAndWorkshopId($itemRequestId, $workshopId);
        } catch (Exception $e) {
            $problem = new Problem(500);
            $problem->setDetail($e->getMessage());
            throw new ProblemException($problem);
        }
    }

    /**
     * Mark repair request as closed (it means either workshop has done repair job successfully or customer and shop have disagreements.
     * In a case of disagreements user can open a dispute.
     * @param int $itemRequestId
     */
    public function closeOffer(int $itemRequestId): void
    {
        try {
            /** @var ItemRequest|null $itemRequest */
            $itemRequest = ItemRequest::find($itemRequestId);

            if (null === $itemRequest) {
                $problem = new Problem(404);
                $problem->setDetail(sprintf('Repair request with id %d not found.', $itemRequestId));
                throw new ProblemException($problem);
            }

            $itemRequest->is_closed = true;
            $itemRequest->save();
        } catch (Exception $e) {
            $problem = new Problem(500);
            $problem->setDetail($e->getMessage());
            throw new ProblemException($problem);
        }
    }
}
