<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateWorkshopRequest;
use App\Service\Shop\Rating\RatingManager;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;

class RatingController extends Controller
{
    /**
     * @param RateWorkshopRequest $request
     * @param Guard $guard
     * @param RatingManager $ratingManager
     * @return JsonResponse
     */
    public function rateAppliedWorkshop(
        RateWorkshopRequest $request,
        Guard $guard,
        RatingManager $ratingManager
    ): JsonResponse {
        /** @var User $user */
        $user = $guard->user();

        $ratingManager->createRatingForRequestContractor(
            $user,
            $request->repairRequestId,
            $request->get('rating')
        );

        return new JsonResponse();
    }
}
