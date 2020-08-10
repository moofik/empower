<?php


namespace App\Repository;


use App\Service\Database\QueryFilter\ValueFilter;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    /**
     * @param string $role
     * @param ValueFilter $filter
     * @return LengthAwarePaginator|User[]
     */
    public function findUsersWithRoleAndFilter(string $role, ValueFilter $filter): LengthAwarePaginator
    {
        /** @var Builder $builder */
        $builder = User::role([$role]);

        $builder = $filter->apply($builder);

        if ($filter->getPerPage()) {
            return $builder->paginate($filter->getPerPage());
        }

        return $builder->paginate();
    }
}
