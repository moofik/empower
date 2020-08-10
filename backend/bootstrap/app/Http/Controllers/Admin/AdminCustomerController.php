<?php

namespace App\Http\Controllers\Admin;

use App\Filter\ValueFilterFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUser;
use App\Http\Requests\Admin\UpdateUser;
use App\Http\Resources\Pipeline\FeedbackDefaultPipeline;
use App\Http\Resources\Transformer\RepairRequest\AddOfferMetadataToRequest;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\Repository\UserRepository;
use App\Repository\ShopFeedbackRepository;
use App\Service\Registration\UserMaker;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class AdminCustomerController extends Controller
{
    /**
     * @param Request $request
     * @param UserRepository $repository
     * @return ExtendableResourceCollection
     */
    public function customers(Request $request, UserRepository $repository)
    {
        $filter = ValueFilterFactory::createFromRequest($request);
        $customers = $repository->findUsersWithRoleAndFilter(User::USER_ROLE_USER, $filter);

        return ExtendableResourceCollection::extendableCollection($customers);
    }

    /**
     * @param CreateUser $createUser
     * @param UserMaker $userMaker
     * @return RestrictableResource
     */
    public function createCustomer(CreateUser $createUser, UserMaker $userMaker): RestrictableResource
    {
        $user = $userMaker->createUser($createUser);

        return RestrictableResource::make($user);
    }

    /**
     * @param int $userId
     * @return RestrictableResource
     */
    public function customer(int $userId): RestrictableResource
    {
        return RestrictableResource::make(User::findOrFail($userId));
    }

    /**
     * @param int $userId
     * @param UpdateUser $updateUser
     * @param UserMaker $userMaker
     * @return RestrictableResource
     */
    public function editCustomer(int $userId, UpdateUser $updateUser, UserMaker $userMaker): RestrictableResource
    {
        $user = $userMaker->updateUser($updateUser, $userId);

        return RestrictableResource::make($user);
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function deleteCustomer(int $userId): JsonResponse
    {
        User::destroy($userId);

        return new JsonResponse();
    }

    /**
     * @param int $userId
     * @param Guard $guard
     * @param Request $request
     * @param ItemRequestRepository $requestRepository
     * @param ItemRequestOfferRepository $requestOfferRepository
     * @return ExtendableResourceCollection
     */
    public function customerRequests(
        int $userId,
        Guard $guard,
        Request $request,
        ItemRequestRepository $requestRepository,
        ItemRequestOfferRepository $requestOfferRepository
    ): ExtendableResourceCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $filter = ValueFilterFactory::createFromRequest($request);
        $requests = $requestRepository->findAllForUserIdWithFilter($userId, $filter);

        $addOfferMetadataToRequest = new AddOfferMetadataToRequest($user, $requestOfferRepository);

        return ExtendableResourceCollection::extendableCollection($requests)
            ->applyTransformer($addOfferMetadataToRequest);
    }

    /**
     * @param int $userId
     * @param Request $request
     * @param ShopFeedbackRepository $feedbackRepository
     * @return ExtendableResourceCollection
     */
    public function customerReviews(
        int $userId,
        Request $request,
        ShopFeedbackRepository $feedbackRepository
    ): ExtendableResourceCollection
    {
        $filter = ValueFilterFactory::createFromRequest($request);
        $requests = $feedbackRepository->findLatestFeedbackForCustomerWithFilter($userId, $filter);
        $feedbackDefaultPipeline = new FeedbackDefaultPipeline();

        return ExtendableResourceCollection::extendableCollection($requests)
            ->applyPipeline($feedbackDefaultPipeline);
    }
}
