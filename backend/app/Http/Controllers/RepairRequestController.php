<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIncomingRepairRequest;
use App\Http\Requests\CreateRepairRequest;
use App\Http\Requests\RepairRequestRequest;
use App\Http\Requests\WorkshopGenericRequest;
use App\Http\Resources\Pipeline\RepairRequestWorkshopPipeline;
use App\Http\Resources\ItemRequestResource;
use App\Http\Resources\ItemRequestCollection;
use App\ItemRequest as RepairRequestModel;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\Service\Monitoring\TelescopeMonitor;
use App\Service\RepairRequest\ItemRequestManager;
use App\Service\RepairRequest\ItemRequestOffersManager;
use App\Service\RepairRequest\ItemRequestViewsManager;
use App\User;
use Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RepairRequestController extends Controller
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
     * RepairRequestController constructor.
     * @param ItemRequestViewsManager $repairRequestViewsManager
     * @param ItemRequestOffersManager $repairRequestOffersManager
     */
    public function __construct(
        ItemRequestViewsManager $repairRequestViewsManager,
        ItemRequestOffersManager $repairRequestOffersManager
    )
    {
        $this->repairRequestViewsManager = $repairRequestViewsManager;
        $this->repairRequestOffersManager = $repairRequestOffersManager;
    }

    /**
     * @param CreateRepairRequest $request
     * @param Guard $guard
     * @param ItemRequestManager $repairRequestMaker
     * @return ItemRequestResource
     */
    public function createBiddingRepairRequest(
        CreateRepairRequest $request,
        Guard $guard,
        ItemRequestManager $repairRequestMaker
    ) {
        TelescopeMonitor::tagDatabaseQueries('create-repair-request');

        /** @var User $user */
        $user = $guard->user();
        $repairRequest = $repairRequestMaker->createForBidding($request);
        $repairRequestMaker->attachToUser($repairRequest, $user);

        return new ItemRequestResource(
            $repairRequest,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );
    }

    /**
     * @param CreateIncomingRepairRequest $request
     * @param Guard $guard
     * @param ItemRequestManager $repairRequestMaker
     * @return ItemRequestResource
     */
    public function createSpecificRepairRequest(
        CreateIncomingRepairRequest $request,
        Guard $guard,
        ItemRequestManager $repairRequestMaker
    ) {
        TelescopeMonitor::tagDatabaseQueries('create-incoming-repair-request');

        /** @var User $user */
        $user = $guard->user();
        $repairRequest = $repairRequestMaker->createForShop($request, $request->workshopId);
        $repairRequestMaker->attachToUser($repairRequest, $user);

        return new ItemRequestResource(
            $repairRequest,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );
    }

    /**
     * @param WorkshopGenericRequest $request
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestCollection
     */
    public function workshopBiddingRepairRequests(
        WorkshopGenericRequest $request,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    ) {
        TelescopeMonitor::tagDatabaseQueries('available-repair-request-list');

        $repairRequests = $repairRequestRepository->findSuitableForShopId($request->user->id);

        $repairRequestCollection = new ItemRequestCollection(
            $repairRequests,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );
        $repairRequestPipeline = new RepairRequestWorkshopPipeline(
            $request->user,
            $repairRequestRepository,
            $repairRequestOfferRepository
        );

        return $repairRequestCollection->applyPipeline($repairRequestPipeline);
    }

    /**
     * @param WorkshopGenericRequest $request
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestCollection
     */
    public function workshopSpecificRepairRequests(
        WorkshopGenericRequest $request,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    ) {
        TelescopeMonitor::tagDatabaseQueries('incoming-repair-request-list');

        $repairRequests = $repairRequestRepository->findIncomingForWorkshopId($request->user->id);

        $repairRequestCollection = new ItemRequestCollection(
            $repairRequests,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );

        $repairRequestPipeline = new RepairRequestWorkshopPipeline(
            $request->user,
            $repairRequestRepository,
            $repairRequestOfferRepository
        );

        return $repairRequestCollection->applyPipeline($repairRequestPipeline);
    }

    /**
     * @param int $repairRequestId
     * @param Guard $guard
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestResource
     */
    public function increaseUniqueViews(
        int $repairRequestId,
        Guard $guard,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    )
    {
        TelescopeMonitor::tagDatabaseQueries('increase-unique-views');

        /** @var RepairRequestModel|null $repairRequest */
        $repairRequest = RepairRequestModel::find($repairRequestId);

        if (!$repairRequest) {
            throw new NotFoundHttpException(sprintf('Repair request with id %d not found.', $repairRequestId));
        }

        /** @var User $user */
        $user = $guard->user();
        $this->repairRequestViewsManager->addUniqueViewer($user, $repairRequest);

        $resource = new ItemRequestResource(
            $repairRequest,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );
        $pipeline = new RepairRequestWorkshopPipeline($user, $repairRequestRepository, $repairRequestOfferRepository);

        return $resource->applyPipeline($pipeline);
    }

    /**
     * @param int $repairRequestId
     * @return JsonResponse
     */
    public function deleteRepairRequest(int $repairRequestId)
    {
        TelescopeMonitor::tagDatabaseQueries('delete-repair-request');

        RepairRequestModel::where('id', $repairRequestId)->delete();

        return new JsonResponse();
    }

    /**
     * @param int $id
     * @param Guard $guard
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestResource
     */
    public function repairRequest(
        int $id,
        Guard $guard,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    ) {
        TelescopeMonitor::tagDatabaseQueries('fetch-repair-request');

        /** @var User $user */
        $user = $guard->user();

        /** @var RepairRequestModel $repairRequest */
        $repairRequest = RepairRequestModel::findOrFail($id);

        $repairRequest = new ItemRequestResource(
            $repairRequest,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );

        $repairRequestPipeline = new RepairRequestWorkshopPipeline(
            $user,
            $repairRequestRepository,
            $repairRequestOfferRepository
        );

        return $repairRequest->applyPipeline($repairRequestPipeline);
    }

    /**
     * @param Guard $guard
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ItemRequestCollection
     */
    public function userRepairRequests(
        Guard $guard,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    ) {
        TelescopeMonitor::tagDatabaseQueries('user_repair_requests');

        /** @var User $user */
        $user = $guard->user();
        $repairRequests = $repairRequestRepository->findAllForUserId($user->id);

        $repairRequestCollection = new ItemRequestCollection(
            $repairRequests,
            $this->repairRequestViewsManager,
            $this->repairRequestOffersManager
        );
        $repairRequestPipeline = new RepairRequestWorkshopPipeline($user, $repairRequestRepository, $repairRequestOfferRepository);

        return $repairRequestCollection->applyPipeline($repairRequestPipeline);
    }

    /**
     * @param RepairRequestRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function denyIncomingRequest(RepairRequestRequest $request)
    {
        /** @var RepairRequestModel|null $repairRequest */
        $repairRequest = RepairRequestModel::find($request->repairRequestId);
        $repairRequest->delete();

        return new JsonResponse();
    }

    /**
     * @param RepairRequestRequest $request
     * @return JsonResponse
     */
    public function acceptIncomingRequest(RepairRequestRequest $request)
    {
        /** @var RepairRequestModel|null $repairRequest */
        $repairRequest = RepairRequestModel::find($request->repairRequestId);
        $repairRequest->is_incoming_accepted = true;
        $repairRequest->save();

        return new JsonResponse();
    }
}
