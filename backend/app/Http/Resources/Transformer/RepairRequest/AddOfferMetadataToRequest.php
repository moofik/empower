<?php


namespace App\Http\Resources\Transformer\RepairRequest;


use App\ItemRequest;
use App\Repository\ItemRequestOfferRepository;
use App\User;
use Moofik\LaravelResourceExtenstion\Transformer\ResourceTransformer;

class AddOfferMetadataToRequest extends ResourceTransformer
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var ItemRequestOfferRepository
     */
    private $itemRequestOfferRepository;

    /**
     * AddOfferMetadataToRequest constructor.
     * @param User $user
     * @param ItemRequestOfferRepository $itemRequestOfferRepository
     */
    public function __construct(User $user, ItemRequestOfferRepository $itemRequestOfferRepository)
    {
        $this->user = $user;
        $this->itemRequestOfferRepository = $itemRequestOfferRepository;
    }

    /**
     * @param ItemRequest $resource
     * @param array $data
     * @return array
     */
    public function transform($resource, array $data): array
    {
        $builder = $resource
            ->itemRequestOffers
            ->where('item_request_id', $resource->id);

        if (!$this->user->hasRole([User::USER_ROLE_MODERATOR, User::USER_ROLE_ADMIN])) {
            $builder->where('shop_id', $this->user->id);
        }

        $offersCount = $builder->count();

        if ($offersCount === 0) {
            $data['offer_been_made'] = false;
        } else {
            $data['offer_been_made'] = true;
        }

        return $data;
    }
}
