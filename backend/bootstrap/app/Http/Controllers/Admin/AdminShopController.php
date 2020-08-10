<?php

namespace App\Http\Controllers\Admin;

use App\Filter\ValueFilterFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUser;
use App\Http\Resources\Pipeline\FeedbackDefaultPipeline;
use App\Repository\ShopFeedbackRepository;
use App\Repository\ShopRepository;
use App\Service\Registration\UserMaker;
use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class AdminShopController extends Controller
{
    /**
     * @param Request $request
     * @param ShopRepository $repository
     * @return ExtendableResourceCollection
     */
    public function shops(Request $request, ShopRepository $repository)
    {
        $filter = ValueFilterFactory::createFromRequest($request);
        $shops = $repository->findAllWithFilter($filter);

        return ExtendableResourceCollection::extendableCollection($shops);
    }

    /**
     * @param int $shopId
     * @return RestrictableResource
     */
    public function shop(int $shopId): RestrictableResource
    {
        $shop = User::role([User::USER_ROLE_SHOP])
            ->with(User::RELATIONS)
            ->where('id', $shopId)
            ->firstOrFail();

        return RestrictableResource::make($shop);
    }

    /**
     * @param int $shopId
     * @param UpdateUser $updateUser
     * @param UserMaker $userMaker
     * @return RestrictableResource
     */
    public function editShop(int $shopId, UpdateUser $updateUser, UserMaker $userMaker): RestrictableResource
    {
        $shop = $userMaker->updateUser($updateUser, $shopId);

        return RestrictableResource::make($shop);
    }

    /**
     * @param int $shopId
     * @return JsonResponse
     * @throws Exception
     */
    public function deleteShop(int $shopId): JsonResponse
    {
        User::role([User::USER_ROLE_SHOP])->where('id', $shopId)->delete();

        return new JsonResponse();
    }

    /**
     * @param int $shopId
     * @param Request $request
     * @param ShopFeedbackRepository $feedbackRepository
     * @return ExtendableResourceCollection
     */
    public function shopReviews(
        int $shopId,
        Request $request,
        ShopFeedbackRepository $feedbackRepository
    ): ExtendableResourceCollection
    {
        $filter = ValueFilterFactory::createFromRequest($request);
        $requests = $feedbackRepository->findLatestFeedbackForShopWithFilter($shopId, $filter);
        $feedbackDefaultPipeline = new FeedbackDefaultPipeline();

        return ExtendableResourceCollection::extendableCollection($requests)
            ->applyPipeline($feedbackDefaultPipeline);
    }
}
