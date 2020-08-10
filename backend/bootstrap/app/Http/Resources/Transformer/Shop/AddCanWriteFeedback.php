<?php


namespace App\Http\Resources\Transformer\Shop;


use App\Repository\ItemRequestRepository;
use App\Repository\ShopFeedbackRepository;
use App\User;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddCanWriteFeedback extends ResourceTransformer
{
    /**
     * @var ItemRequestRepository
     */
    private $repairRequestRepository;
    /**
     * @var User
     */
    private $user;
    /**
     * @var ShopFeedbackRepository
     */
    private $feedbackRepository;

    /**
     * AddCanWriteFeedback constructor.
     * @param User $user
     * @param ItemRequestRepository $repairRequestRepository
     * @param ShopFeedbackRepository $feedbackRepository
     */
    public function __construct(?User $user, ItemRequestRepository $repairRequestRepository, ShopFeedbackRepository $feedbackRepository)
    {
        $this->repairRequestRepository = $repairRequestRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->user = $user;
    }

    /**
     * @param User $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        if (null === $this->user) {
            $data['can_write_feedback'] = false;
        } else {
            $dealsCount = $this->repairRequestRepository->countUserHasRequestsDoneByShopId(
                $this->user->id,
                $resource->id
            );
            $reviewsForThisShopCount = $this->feedbackRepository->countShopReviewsForUserId(
                $resource->id,
                $this->user->id
            );
            $data['can_write_feedback'] = $dealsCount > $reviewsForThisShopCount;
        }

        return $data;
    }
}
