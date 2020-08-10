<?php


namespace App\Http\Resources\Transformer\Shop;


use App\ItemRequest;
use App\User;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class WorkshopCanBeRated extends ResourceTransformer
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var ItemRequest
     */
    private $repairRequest;

    /**
     * WorkshopCanBeRated constructor.
     * @param User $user
     * @param ItemRequest $repairRequest
     */
    public function __construct(User $user, ItemRequest $repairRequest)
    {
        $this->user = $user;
        $this->repairRequest = $repairRequest;
    }

    /**
     * @param User $resource
     * @param array $data
     *
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $rating = $resource
            ->ratings()
            ->where('customer_id', $this->user->id)
            ->where('repair_request_id', $this->repairRequest->id)
            ->count();

        $data['can_be_rated'] = $rating > 0 ? false : true;

        return $data;
    }
}
