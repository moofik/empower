<?php


namespace App\Repository;


use App\ItemRequestOffer;
use App\Service\Database\QueryFilter\ValueFilter;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ItemRequestOfferRepository
{
    /**
     * @param int $repairRequestId
     * @param int $workshopId
     * @throws Exception
     */
    public function deleteByItemRequestIdAndWorkshopId(int $repairRequestId, int $workshopId): void
    {
        ItemRequestOffer::where('shop_id', $workshopId)
            ->where('item_request_id', $repairRequestId)
            ->delete();
    }

    /**
     * @param int $repairRequestId
     * @param int $workshopId
     * @return ItemRequestOffer|null
     */
    public function findByItemRequestIdAndWorkshopId(int $repairRequestId, int $workshopId): ?ItemRequestOffer
    {
        return ItemRequestOffer::where('shop_id', $workshopId)
            ->where('item_request_id', $repairRequestId)
            ->first();
    }

    /**
     * @param int $repairRequestId
     * @return LengthAwarePaginator
     */
    public function findByRepairRequestId(int $repairRequestId): LengthAwarePaginator
    {
        return ItemRequestOffer::with(['workshop'])
            ->where('repair_request_id', $repairRequestId)
            ->paginate();
    }

    /**
     * @param int $repairRequestId
     * @param ValueFilter $filter
     * @return LengthAwarePaginator
     */
    public function findByRepairRequestIdWithFilter(int $repairRequestId, ValueFilter $filter): LengthAwarePaginator
    {
        $builder = ItemRequestOffer::with(['workshop', 'repairRequest'])
            ->where('item_request_id', $repairRequestId);

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }

    /**
     * @param int $itemRequestId
     * @throws Exception
     */
    public function deleteByRepairRequestId(int $itemRequestId): void
    {
        ItemRequestOffer::where('item_request_id', $itemRequestId)->delete();
    }

    /**
     * @param int $itemRequestId
     * @param int $exceptedOfferId
     */
    public function deleteByRepairRequestIdExcept(int $itemRequestId, int $exceptedOfferId): void
    {
        ItemRequestOffer::where('item_request_id', $itemRequestId)
            ->where('item_request_id', '!=', $exceptedOfferId)
            ->delete();
    }

    /**
     * @param $itemRequestId
     * @param $userId
     * @return ItemRequestOffer|null
     */
    public function findByItemRequestIdAndUserId($itemRequestId, $userId): ?ItemRequestOffer
    {
        $callbackQuery = function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        };

        return ItemRequestOffer::whereId($itemRequestId)
            ->whereHas('itemRequest', $callbackQuery)
            ->first();
    }
}
