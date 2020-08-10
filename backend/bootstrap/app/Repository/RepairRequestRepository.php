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

class RepairRequestRepository
{
    /**
     * Find repair requests suitable for the workshop who requests its available repair request lists
     * Availability (and consequently visibility in the repair request list)  is determined as combination of four params:
     * 1) Shop has required spare parts type (according to repair request)
     * 2) Shop makes repairing of certain car makes (according to repair request)
     * 3) Shop provide required repair services (according to repair request)
     * 4) Shop and repair requester are both in one area, so the workshop can take a repair job for the requester
     * @param int $workshopId
     * @return Collection|ItemRequest[]|LengthAwarePaginator
     */
    public function findSuitableForWorkshopId(int $workshopId)
    {
        $workshop = $this->findUser($workshopId, ['workshopMakes', 'workshopServices', 'workshopSpareParts']);

        $currentWorkshopMakeIds = $workshop->workshopMakes->pluck('id');
        $currentWorkshopServiceIds = $workshop->workshopServices->pluck('id');
        $currentWorkshopSparePartsIds = $workshop->workshopSpareParts->pluck('id');

        return ItemRequest::whereIn('make_id', $currentWorkshopMakeIds)
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
            ->whereNull('workshop_id')
            ->orderBy('make_id')
            ->paginate();
    }

    public function findIncomingForWorkshopId(int $workshopId)
    {
        return ItemRequest::where('workshop_id', $workshopId)
            ->where('is_incoming', true)
            ->whereNull('is_incoming_accepted')
            ->orderBy('make_id')
            ->paginate();
    }

    public function findAllForUserId(int $userId)
    {
        return ItemRequest::where('user_id', $userId)
            ->orderBy('is_closed','ASC')
            ->orderBy('is_incoming', 'DESC')
            ->paginate();
    }

    public function findAllForUserIdWithFilter(int $userId, ValueFilter $filter)
    {
        $builder = ItemRequest::where('user_id', $userId)
            ->orderBy('is_closed','ASC')
            ->orderBy('is_incoming', 'DESC');

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }

    /**
     * @param int $workshopId
     * @return ItemRequest[]|LengthAwarePaginator|Collection
     */
    public function findOnlyWithOffersForWorkshopId(int $workshopId)
    {
        $builderCallback = function (Builder $query) use ($workshopId) {
            $query->where('workshop_id', '=', $workshopId);
        };

        return ItemRequest::whereHas('repairRequestOffers', $builderCallback)->paginate();
    }

    /**
     * @param int $workshopId
     * @return ItemRequest[]|Collection|LengthAwarePaginator
     */
    public function findAllForWorkshopId(int $workshopId)
    {
        $offersBuilderCallback = function (Builder $query) use ($workshopId) {
            $query->where('workshop_id', '=', $workshopId);
        };

        return ItemRequest::whereHas('repairRequestOffers', $offersBuilderCallback)
            ->orWhere('workshop_id', $workshopId)
            ->orderBy('updated_at', 'DESC')
            ->orderBy('is_closed', 'DESC')
            ->paginate();
    }

    /**
     * @param int $userId
     * @param int $repairRequestId
     * @return bool
     */
    public function     findUserOrWorkshopHasRepairRequest(int $userId, int $repairRequestId): bool
    {
        $user = ItemRequest::where('id', $repairRequestId)
            ->where(function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->orWhere('workshop_id', $userId);
            })
            ->first();

        return null !== $user;
    }

    /**
     * @param int $workshopId
     * @param int $repairRequestId
     * @return bool
     */
    public function findWorkshopHasRepairRequest(int $workshopId, int $repairRequestId): bool
    {
        $user = ItemRequest::where('workshop_id', $workshopId)
            ->where('id', $repairRequestId)
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
     * @param int $workshopId
     * @return bool
     */
    public function findUserHasRequestsDoneByShopId(int $userId, int $workshopId): bool
    {
        $repairRequest = ItemRequest::whereUserId($userId)
            ->whereWorkshopId($workshopId)
            ->whereIsClosed(true)
            ->first();

        return null !== $repairRequest;
    }

    /**
     * @param int $userId
     * @param int $workshopId
     * @return int
     */
    public function countUserHasRequestsDoneByShopId(int $userId, int $workshopId): int
    {
        return ItemRequest::whereUserId($userId)
            ->whereWorkshopId($workshopId)
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
