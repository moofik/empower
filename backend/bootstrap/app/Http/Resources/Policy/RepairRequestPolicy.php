<?php


namespace App\Http\Resources\Policy;


use App\ItemRequest;
use App\Repository\ItemRequestOfferRepository;
use App\Repository\ItemRequestRepository;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Moofik\LaravelResourceExtenstion\Policy\ResourcePolicy;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RepairRequestPolicy extends ResourcePolicy
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var ItemRequestOfferRepository
     */
    private $repairRequestOfferRepository;

    /**
     * @var ItemRequestRepository
     */
    private $repairRequestRepository;

    /**
     * AddOfferMetadataToRequest constructor.
     * @param User $user
     * @param ItemRequestRepository $repairRequestRepository
     * @param ItemRequestOfferRepository $repairRequestOfferRepository
     */
    public function __construct(
        User $user,
        ItemRequestRepository $repairRequestRepository,
        ItemRequestOfferRepository $repairRequestOfferRepository
    )
    {
        $this->user = $user;
        $this->repairRequestOfferRepository = $repairRequestOfferRepository;
        $this->repairRequestRepository = $repairRequestRepository;
    }

    /**
     * @return array
     * @var ItemRequest $resource
     */
    public function getHiddenFields($resource): array
    {
        $offersCount = $resource->itemRequestOffers->count();

        $isOwner = $resource->ownerUser->where('id', $this->user->id);

        if ($offersCount === 0 && !$isOwner) {
            return ['name', 'email', 'phone'];
        }

        return [];
    }

    /**
     * @return array
     * @throws AccessDeniedHttpException
     * @var Model $resource
     */
    public function getVisibleFields($resource): array
    {
        if (!$this->user->hasRole(
            [
                User::USER_ROLE_SHOP,
                User::USER_ROLE_USER,
                User::USER_ROLE_ADMIN
            ]
        )) {
            throw new AccessDeniedHttpException();
        }

        return [];
    }
}
