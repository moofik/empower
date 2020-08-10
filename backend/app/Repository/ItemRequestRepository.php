<?php


namespace App\Repository;


use App\ItemRequest;
use App\Service\Database\QueryFilter\ValueFilter;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class ItemRequestRepository
{
    /**
     * @param int $shopId
     * @return LengthAwarePaginator
     */
    public function findSuitableForShopId(int $shopId)
    {
        $shop = $this->findUser($shopId, ['shopBrands', 'shopItems', 'shopSpareParts']);

        $currentWorkshopMakeIds = $shop->shopBrands->pluck('id');
        $currentWorkshopServiceIds = $shop->shopItems->pluck('id');
        $currentWorkshopSparePartsIds = $shop->shopSpareParts->pluck('id');

        return ItemRequest::whereIn('brand_id', $currentWorkshopMakeIds)
            ->whereIn('service_id', $currentWorkshopServiceIds)
            ->whereIn('spare_parts_id', $currentWorkshopSparePartsIds)
            ->where(function (Builder $query) {
                $query
                    ->whereNull('is_closed')
                    ->orWhere('is_closed', false);
            })
            ->where(function (Builder $query) {
                $query
                    ->whereNull('is_incoming')
                    ->orWhere('is_incoming', false);
            })
            ->whereNull('shop_id')
            ->orderBy('brand_id')
            ->paginate();
    }

    public function findIncomingForWorkshopId(int $workshopId)
    {
        return ItemRequest::where('shop_id', $workshopId)
            ->where('is_incoming', true)
            ->whereNull('is_incoming_accepted')
            ->orderBy('brand_id')
            ->paginate();
    }

    public function findAllForUserId(int $userId)
    {
        return ItemRequest::where('user_id', $userId)
            ->orderBy('is_closed', 'ASC')
            ->orderBy('is_incoming', 'DESC')
            ->paginate();
    }

    public function findAllForUserIdWithFilter(int $userId, ValueFilter $filter)
    {
        $builder = ItemRequest::where('user_id', $userId)
            ->orderBy('is_closed', 'ASC')
            ->orderBy('is_incoming', 'DESC');

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }

    /**
     * @param int $shopId
     * @return ItemRequest[]|LengthAwarePaginator|Collection
     */
    public function findOnlyWithOffersForWorkshopId(int $shopId)
    {
        $builderCallback = function (Builder $query) use ($shopId) {
            $query->where('shop_id', '=', $shopId);
        };

        return ItemRequest::whereHas('repairRequestOffers', $builderCallback)->paginate();
    }

    /**
     * @param int $shopId
     * @return ItemRequest[]|Collection|LengthAwarePaginator
     */
    public function findAllForWorkshopId(int $shopId)
    {
        $offersBuilderCallback = function (Builder $query) use ($shopId) {
            $query->where('shop_id', '=', $shopId);
        };

        return ItemRequest::whereHas('repairRequestOffers', $offersBuilderCallback)
            ->orWhere('shop_id', $shopId)
            ->orderBy('updated_at', 'DESC')
            ->orderBy('is_closed', 'DESC')
            ->paginate();
    }

    /**
     * @param int $userId
     * @param int $repairRequestId
     * @return bool
     */
    public function findUserOrWorkshopHasRepairRequest(int $userId, int $repairRequestId): bool
    {
        $user = ItemRequest::where('id', $repairRequestId)
            ->where(function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->orWhere('shop_id', $userId);
            })
            ->first();

        return null !== $user;
    }

    /**
     * @param int $shopId
     * @param int $itemRequestId
     * @return bool
     */
    public function findWorkshopHasRepairRequest(int $shopId, int $itemRequestId): bool
    {
        $user = ItemRequest::where('shop_id', $shopId)
            ->where('id', $itemRequestId)
            ->where(function (Builder $query) {
                $query
                    ->whereNull('is_incoming_accepted')
                    ->orWhere('is_incoming_accepted', true);
            })
            ->first();

        return null !== $user;
    }

    /**
     * @param int $userId
     * @param int $shopId
     * @return bool
     */
    public function findUserHasRequestsDoneByShopId(int $userId, int $shopId): bool
    {
        $repairRequest = ItemRequest::whereUserId($userId)
            ->whereWorkshopId($shopId)
            ->whereIsClosed(true)
            ->first();

        return null !== $repairRequest;
    }

    /**
     * @param int $userId
     * @param int $shopId
     * @return int
     */
    public function countUserHasRequestsDoneByShopId(int $userId, int $shopId): int
    {
        return ItemRequest::whereUserId($userId)
            ->whereWorkshopId($shopId)
            ->whereIsClosed(true)
            ->count();
    }

    /**
     * @param int $userId
     * @param array $with
     * @return User|Model|null
     */
    protected function findUser(int $userId, array $with = [])
    {
        $user = User::with($with)->find($userId);

        if (!$user instanceof User) {
            throw new InvalidArgumentException();
        }

        return $user;
    }

    /**
     * @param ValueFilter $filter
     * @return LengthAwarePaginator
     */
    public function findAllWithFilter(ValueFilter $filter): LengthAwarePaginator
    {
        /** @var Builder $builder */
        $builder = ItemRequest::query();
        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }
}
