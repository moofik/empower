<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelOfferRequest;
use App\Http\Requests\OfferActionRequest;
use App\Http\Requests\RepairRequestRequest;
use App\Http\Resources\Pipeline\PublicOfferedWorkshopPipeline;
use App\Http\Resources\Pipeline\PublicWorkshopPipeline;
use App\Http\Resources\Pipeline\RepairRequestWorkshopPipeline;
use App\Http\Resources\Policy\PublicWorkshopPolicy;
use App\Http\Resources\ItemRequestCollection;
use App\Http\Resources\Transformer\Shop\AddOfferToWorkshop;
use App\Http\Resources\Transformer\Shop\WorkshopCanBeRated;
use App\ItemRequest as RepairRequestModel;
use App\ItemRequestOffer;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\Repository\ShopRepository;
use App\Service\Monitoring\TelescopeMonitor;
use App\Service\RepairRequest\ItemRequestOffersManager;
use App\Service\RepairRequest\ItemRequestViewsManager;
use App\User;
use Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OfferController extends Controller
{
    /**
     * @var ItemRequestViewsManager
     */
    private $repairRequestViewsManager;

    /**
     * @var ItemRequestOffersManager
     */
    private $repairRequestOffersManager;

    /**
     * OfferController constructor.
     * @param ItemRequestViewsManager $repairRequestViewsManager
     * @param ItemRequestOffersManager $repairRequestOffersManager
     */
    public function __construct(
        ItemRequestViewsManager $repairRequestViewsManager,
        ItemRequestOffersManager $repairRequestOffersManager
    ) {
        $this->repairRequestViewsManager = $repairRequestViewsManager;
        $this->repairRequestOffersManager = $repairRequestOffersManager;
    }

    /**
     * @param Guard $guard
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestCollection
     */
    public function offers(Guard $guard, ItemRequestRepository $repairRequestRepository, ItemRequestOfferRepository $repairRequestOfferRepository)
    {
        TelescopeMonitor::tagDatabaseQueries('repair-request-workshop-offers');

        /** @var User $user */
        $user = $guard->user();
        $repairRequests = $repairRequestRepository->findAllForWorkshopId($user->id);

        $repairRequestCollection = new ItemRequestCollection(
            $repairRequests,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );

        $repairRequestPipeline = new RepairRequestWorkshopPipeline($user, $repairRequestRepository, $repairRequestOfferRepository);

        return $repairRequestCollection->applyPipeline($repairRequestPipeline);
    }

    /**
     * @param int $id
     * @return ExtendableResourceCollection
     */
    public function workshopsThroughOffers(int $id)
    {
        TelescopeMonitor::tagDatabaseQueries('workshop-through-offers');

        $builderCallback = function (Builder $query) use ($id) {
            $query->where('id', '=', $id);
        };

        $workshops = User::with(User::RELATIONS)
            ->whereHas('offers', $builderCallback)
            ->paginate();

        $pipeline = new PublicOfferedWorkshopPipeline();

        return ExtendableResourceCollection::extendableCollection($workshops)->applyPipeline($pipeline);
    }

    /**
     * @param int $id
     * @param Guard $guard
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @param ShopRepository $workshopRepository
     * @return ExtendableResourceCollection
     */
    public function repairRequestOfferWorkshops(
        int $id,
        Guard $guard,
        ItemRequestOfferRepository $repairRequestOfferRepository,
        ShopRepository $workshopRepository
    ) {
        TelescopeMonitor::tagDatabaseQueries('repair-request-workshop-offers');

        $workshops = $workshopRepository->findByItemRequestId($id);
        $workshopPolicy = new PublicWorkshopPolicy();
        $addOfferToWorkshopTransformer = new AddOfferToWorkshop($id, $repairRequestOfferRepository);
        $resource = ExtendableResourceCollection::extendableCollection($workshops);

        return $resource
            ->applyPolicy($workshopPolicy)
            ->applyTransformer($addOfferToWorkshopTransformer);
    }

    /**
     * @param Guard $guard
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestCollection
     */
    public function workshopOffers(
        Guard $guard,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    ) {
        TelescopeMonitor::tagDatabaseQueries('repair-request-workshop-offers');

        /** @var User $user */
        $user = $guard->user();
        $repairRequests = $repairRequestRepository->findOnlyWithOffersForWorkshopId($user->id);

        $repairRequestCollection = new ItemRequestCollection(
            $repairRequests,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );
        $repairRequestPipeline = new RepairRequestWorkshopPipeline($user, $repairRequestRepository, $repairRequestOfferRepository);

        return $repairRequestCollection->applyPipeline($repairRequestPipeline);
    }

    /**
     * @param CancelOfferRequest $request
     * @param Guard $guard
     * @param ItemRequestOffersManager $offersManager
     * @return JsonResponse
     */
    public function cancelOffer(
        CancelOfferRequest $request,
        Guard $guard,
        ItemRequestOffersManager $offersManager
    ) {
        TelescopeMonitor::tagDatabaseQueries('cancel-offer');

        /** @var User $user */
        $user = $guard->user();
        $offersManager->deleteOffer($request->repairRequestId, $user->id);

        return new JsonResponse();
    }

    /**
     * @param int $repairRequestId
     * @param Guard $guard
     * @return JsonResponse
     */
    public function makeOffer(
        int $repairRequestId,
        Guard $guard
    ) {
        TelescopeMonitor::tagDatabaseQueries('increase-unique-views');

        /** @var RepairRequestModel|null $repairRequest */
        $repairRequest = RepairRequestModel::find($repairRequestId);

        if (!$repairRequest) {
            throw new NotFoundHttpException(sprintf('Repair request with id %d not found.', $repairRequestId));
        }

        /** @var User $user */
        $user = $guard->user();
        $this->repairRequestOffersManager->addUniqueOffer($user, $repairRequest);

        return new JsonResponse();
    }

    /**
     * @param OfferActionRequest $request
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return JsonResponse
     * @throws Exception
     */
    public function acceptWorkshopOffer(OfferActionRequest $request, ItemRequestOfferRepository $repairRequestOfferRepository)
    {
        /** @var ItemRequestOffer $offer */
        $offer = ItemRequestOffer::find($request->offerId);
        $workshop = User::find($offer->shop_id);

        $offer->repairRequest->applicantShop()->associate($workshop);
        $offer->repairRequest->save();

        $repairRequestOfferRepository->deleteByRepairRequestId($offer->item_request_id);

        return new JsonResponse();
    }

    /**
     * @param OfferActionRequest $request
     * @return JsonResponse
     */
    public function declineWorkshopOffer(OfferActionRequest $request)
    {
        ItemRequestOffer::where('id', $request->offerId)->delete();

        return new JsonResponse();
    }

    /**
     * @param RepairRequestRequest $request
     * @param ItemRequestOffersManager $repairRequestOffersManager
     * @return JsonResponse
     */
    public function closeOffer(RepairRequestRequest $request, ItemRequestOffersManager $repairRequestOffersManager)
    {
        $repairRequestOffersManager->closeOffer($request->repairRequestId);

        return new JsonResponse();
    }

    /**
     * @param int $id
     * @param Guard $guard
     * @param ShopRepository $workshopRepository
     * @return JsonResponse|RestrictableResource
     */
    public function applicantWorkshop(int $id, Guard $guard, ShopRepository $workshopRepository)
    {
        /** @var RepairRequestModel $repairRequest */
        $repairRequest = RepairRequestModel::find($id);

        $workshop = $repairRequest
            ->applicantShop()
            ->with(User::RELATIONS)
            ->first();

        if (null === $workshop) {
            return new JsonResponse();
        }

        /** @var User $user */
        $user = $guard->user();

        $workshopResource = new RestrictableResource($workshop);
        $pipeline = new PublicWorkshopPipeline($workshopRepository);
        $canBeRatedTransformer = new WorkshopCanBeRated($user, $repairRequest);

        return $workshopResource
            ->applyPipeline($pipeline)
            ->applyTransformer($canBeRatedTransformer);
    }
}
