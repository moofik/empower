<?php


namespace App\Service\Database\QueryFilter;


use Illuminate\Database\Eloquent\Builder;

interface QueryFilter
{
    public function apply(Builder $builder): Builder;
}
