<?php


namespace App\Http\Resources\Transformer\Shop;


use App\Repository\ItemRequestOfferRepository;
use App\User;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddOfferToWorkshop extends ResourceTransformer
{
    /**
     * @var ItemRequestOfferRepository
     */
    private $itemRequestOfferRepository;

    /**
     * @var int
     */
    private $itemRequestId;

    /**
     * AddOfferMetadataToRequest constructor.
     * @param int $itemRequestId
     * @param ItemRequestOfferRepository $itemRequestOfferRepository
     */
    public function __construct(int $itemRequestId, ItemRequestOfferRepository $itemRequestOfferRepository)
    {
        $this->itemRequestOfferRepository = $itemRequestOfferRepository;
        $this->itemRequestId = $itemRequestId;
    }

    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $offer = $this->itemRequestOfferRepository->findByItemRequestIdAndWorkshopId(
            $this->itemRequestId,
            $resource->id
        );

        $data['offer'] = $offer;

        return $data;
    }
}
