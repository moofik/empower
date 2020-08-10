<?php


namespace App\Service\Database\QueryFilter;


use Illuminate\Database\Eloquent\Builder;

class RelationValueFilter implements QueryFilter
{
    private $whereHas = [];

    public function whereRelationHas(string $relationName, string $column, $value)
    {
        $this->whereHas[$relationName][$column] = $value;
    }

    public function apply(Builder $builder): Builder
    {
        foreach ($this->whereHas as $whereHas => $filter)
        {
            $builder->whereHas($whereHas, function (Builder $query) use ($filter) {
                foreach ($filter as $column => $value) {
                    $query->where($column, $value);
                }
            });
        }

        return $builder;
    }
}
