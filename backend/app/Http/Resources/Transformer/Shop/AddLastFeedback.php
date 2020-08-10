<?php


namespace App\Http\Resources\Transformer\Shop;


use App\Repository\RatingRepository;
use App\Repository\ShopFeedbackRepository;
use App\User;
use App\ShopFeedback;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddLastFeedback extends ResourceTransformer
{
    /**
     * @var ShopFeedbackRepository
     */
    private $feedbackRepository;
    /**
     * @var RatingRepository
     */
    private $ratingRepository;

    /**
     * AddLastFeedback constructor.
     * @param ShopFeedbackRepository $feedbackRepository
     * @param RatingRepository $ratingRepository
     */
    public function __construct(ShopFeedbackRepository $feedbackRepository, RatingRepository $ratingRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
        $this->ratingRepository = $ratingRepository;
    }

    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        /** @var ShopFeedback|null $lastFeedback */
        $lastFeedback = $this->feedbackRepository->findLatestFeedbackForShop($resource->id);

        $data['last_feedback'] = $lastFeedback;
        $data['last_feedback_rating'] = null;

        if ($lastFeedback) {
            $data['last_feedback_rating'] = $this
                ->ratingRepository
                ->getLastRatingForShopAndCustomer($lastFeedback->shop_id, $lastFeedback->customer_id)
                ->rating_score;
        }

        return $data;
    }
}
