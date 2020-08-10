<?php

namespace App\Http\Controllers\Admin;

use App\Filter\ValueFilterFactory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transformer\RepairRequest\AddOfferMetadataToRequest;
use App\ItemRequest;
use App\ItemRequestOffer;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class AdminRepairRequestController extends Controller
{
    /**
     * @param Guard $guard
     * @param Request $request
     * @param ItemRequestRepository $requestRepository
     * @param ItemRequestOfferRepository $requestOfferRepository
     * @return ExtendableResourceCollection
     */
    public function requests(
        Guard $guard,
        Request $request,
        ItemRequestRepository $requestRepository,
        ItemRequestOfferRepository $requestOfferRepository
    ): ExtendableResourceCollection {
        /** @var User $user */
        $user = $guard->user();
        $filter = ValueFilterFactory::createFromRequest($request);
        $requests = $requestRepository->findAllWithFilter($filter);

        $addOfferMetadataToRequest = new AddOfferMetadataToRequest($user, $requestOfferRepository);

        return ExtendableResourceCollection::extendableCollection($requests)
            ->applyTransformer($addOfferMetadataToRequest);
    }

    /**
     * @param int $requestId
     * @param Guard $guard
     * @param ItemRequestOfferRepository $requestOfferRepository
     * @return RestrictableResource
     */
    public function request(int $requestId, Guard $guard, ItemRequestOfferRepository $requestOfferRepository): RestrictableResource
    {
        /** @var User $user */
        $user = $guard->user();
        $requests = ItemRequest::findOrFail($requestId);

        $addOfferMetadataToRequest = new AddOfferMetadataToRequest($user, $requestOfferRepository);

        return RestrictableResource::make($requests)
            ->applyTransformer($addOfferMetadataToRequest);
    }

    /**
     * @param int $requestId
     * @return JsonResponse
     */
    public function deleteRequest(int $requestId): JsonResponse
    {
        ItemRequest::destroy($requestId);

        return new JsonResponse();
    }

    /**
     * @param int $requestId
     * @param Request $request
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     * @return ExtendableResourceCollection
     */
    public function repairRequestOffers(int $requestId, Request $request, ItemRequestOfferRepository $repairRequestOfferRepository): ExtendableResourceCollection
    {
        $filter = ValueFilterFactory::createFromRequest($request);
        $offers = $repairRequestOfferRepository->findByRepairRequestIdWithFilter($requestId, $filter);

        return ExtendableResourceCollection::extendableCollection($offers);
    }

    /**
     * @param int $requestId
     * @return JsonResponse
     */
    public function deleteOffer(int $requestId): JsonResponse
    {
        ItemRequestOffer::destroy($requestId);

        return new JsonResponse();
    }
}
