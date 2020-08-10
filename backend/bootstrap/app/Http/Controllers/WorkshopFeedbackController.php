<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShopFeedback;
use App\Http\Resources\Pipeline\FeedbackDefaultPipeline;
use App\Repository\ShopFeedbackRepository;
use App\Service\Feedback\FeedbackManager;
use App\User;
use App\ShopFeedback;
use Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class WorkshopFeedbackController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function deleteFeedback(int $id): JsonResponse
    {
        ShopFeedback::destroy($id);

        return new JsonResponse();
    }

    /**
     * @param int $shopId
     * @param Request $request
     * @param ShopFeedbackRepository $feedbackRepository
     * @return RestrictableResource
     */
    public function shopFeedbacks(int $shopId, Request $request, ShopFeedbackRepository $feedbackRepository)
    {
        $feedbacks = $feedbackRepository->findFeedbackForShop($shopId, $request->get('perPage', 3));

        return (new RestrictableResource($feedbacks))
            ->applyPipeline(new FeedbackDefaultPipeline());
    }

    /**
     * @param CreateShopFeedback $createFeedbackRequest
     * @param Guard $guard
     * @param FeedbackManager $feedbackManager
     * @return RestrictableResource
     * @throws Exception
     */
    public function createFeedback(CreateShopFeedback $createFeedbackRequest, Guard $guard, FeedbackManager $feedbackManager)
    {
        /** @var User $user */
        $user = $guard->user();

        $feedback = $feedbackManager->createFeedback(
            $user->id,
            $createFeedbackRequest->shopId,
            $createFeedbackRequest->text,
            $createFeedbackRequest->image
        );

        return (new RestrictableResource($feedback))
            ->applyPipeline(new FeedbackDefaultPipeline());
    }

    /**
     * @param int $id
     * @param Request $request
     * @param ShopFeedbackRepository $feedbackRepository
     * @return ExtendableResourceCollection
     */
    public function fetchWorkshopFeedback(int $id, Request $request, ShopFeedbackRepository $feedbackRepository): ExtendableResourceCollection
    {
        $feedback = $feedbackRepository->findFeedbackForShop($id, $request->get('perPage', 3));

        return ExtendableResourceCollection::extendableCollection($feedback)
            ->applyPipeline(new FeedbackDefaultPipeline());
    }

    /**
     * @param Request $request
     * @param ShopFeedbackRepository $feedbackRepository
     * @return ExtendableResourceCollection
     */
    public function latestFeedbacks(Request $request, ShopFeedbackRepository $feedbackRepository): ExtendableResourceCollection
    {
        $feedback = $feedbackRepository->findLatestFeedbacks($request->get('perPage', 3));

        return ExtendableResourceCollection::extendableCollection($feedback)
            ->applyPipeline(new FeedbackDefaultPipeline());
    }
}
