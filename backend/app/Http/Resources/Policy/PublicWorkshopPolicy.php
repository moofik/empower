<?php


namespace App\Http\Resources\Policy;


use Moofik\LaravelResourceExtenstion\Policy\ResourcePolicy;

class PublicWorkshopPolicy extends ResourcePolicy
{
    public function getHiddenFields($resource): array
    {
        return [];
    }

    public function getVisibleFields($resource): array
    {
        return [];
    }
}
