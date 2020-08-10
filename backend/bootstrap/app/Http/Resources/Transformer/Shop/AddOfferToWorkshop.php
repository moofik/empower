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
    private $repairRequestOfferRepository;

    /**
     * @var int
     */
    private $repairRequestId;

    /**
     * AddOfferMetadataToRequest constructor.
     * @param int $repairRequestId
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     */
    public function __construct(int $repairRequestId, ItemRequestOfferRepository $repairRequestOfferRepository)
    {
        $this->repairRequestOfferRepository = $repairRequestOfferRepository;
        $this->repairRequestId = $repairRequestId;
    }

    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $offer = $this->repairRequestOfferRepository->findByItemRequestIdAndWorkshopId(
            $this->repairRequestId,
            $resource->id
        );

        $data['offer'] = $offer;

        return $data;
    }
}
