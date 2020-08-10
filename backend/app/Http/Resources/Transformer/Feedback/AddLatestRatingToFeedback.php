<?php


namespace App\Http\Resources\Transformer\Feedback;


use App\Rating;
use App\ShopFeedback;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddLatestRatingToFeedback extends ResourceTransformer
{
    /**
     * @param ShopFeedback $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $score = null;
        /** @var Rating $rating */
        $rating = Rating::whereShopId($resource->shop_id)
            ->whereCustomerId($resource->customer_id)
            ->latest('id')
            ->first();

        if ($rating !== null) {
            $score = $rating->rating_score;
        }

        $data['rating'] = $score;

        return $data;
    }
}
