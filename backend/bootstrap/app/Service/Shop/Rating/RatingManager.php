<?php


namespace App\Service\Shop\Rating;


use App\Rating;
use App\ItemRequest;
use App\User;

class RatingManager
{
    /**
     * @param User $customer
     * @param int $repairRequestId
     * @param int $ratingScore
     * @return Rating
     */
    public function createRatingForRequestContractor(User $customer, int $repairRequestId, float $ratingScore): Rating
    {
        $rating = new Rating();
        $rating->customer_id = $customer->id;
        $rating->repair_request_id = $repairRequestId;
        $rating->shop_id = ItemRequest::find($repairRequestId)->applicantWorkshop->id;
        $rating->rating_score = $ratingScore;
        $rating->save();

        return $rating;
    }
}
