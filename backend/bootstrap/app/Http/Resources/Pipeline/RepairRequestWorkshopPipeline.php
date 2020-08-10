<?php


namespace App\Http\Resources\Pipeline;


use App\Http\Resources\Policy\RepairRequestPolicy;
use App\Http\Resources\Transformer\RepairRequest\AddOfferMetadataToRequest;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\User;
use Moofik\LaravelResourceExtenstion\Pipeline\ExtensionPipeline;

class RepairRequestWorkshopPipeline extends ExtensionPipeline
{
    /**
     * RepairRequestWorkshopPipeline constructor.
     * @param User $user
     * @param ItemRequestRepository $requestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     */
    public function __construct(
        User $user,
        ItemRequestRepository $requestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    ) {
        $this
            ->addPolicy(new RepairRequestPolicy($user, $requestRepository, $repairRequestOfferRepository))
            ->addTransformer(new AddOfferMetadataToRequest($user, $repairRequestOfferRepository));
    }
}
