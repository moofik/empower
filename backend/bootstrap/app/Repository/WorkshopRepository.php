<?php


namespace App\Repository;


use App\Rating;
use App\Service\Database\QueryFilter\ValueFilter;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class WorkshopRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return User::with(User::RELATIONS)
            ->has('requests')
            ->where('id', $id)
            ->delete();
    }

    /**
     * @param int $id
     * @return Collection|object|null
     */
    public function findByRepairRequestId(int $id)
    {
        $builderCallback = function (Builder $query) use ($id) {
            $query->where('repair_request_id', $id);
        };

        return User::with(User::RELATIONS)
            ->whereHas('offers', $builderCallback)
            ->paginate();
    }

    /**
     * @param ValueFilter $filter
     * @return Collection|object|null
     */
    public function findAllWithFilter(ValueFilter $filter)
    {
        $builder = User::role([User::USER_ROLE_SHOP])->with(User::RELATIONS);

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }

    /**
     * @param int $shopId
     * @return int
     */
    public function getRatingScore(int $shopId): int
    {
        return Rating::where('shop_id', $shopId)
            ->sum('rating_score');
    }
}
