<?php

namespace App\Http\Resources;


use App\User;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\ErrorInspectionHelpers;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class ShopResource extends RestrictableResource
{
    use ErrorInspectionHelpers;

    /**
     * Shop constructor.
     * @param User $resource
     */
    public function __construct(User $resource) {
        parent::__construct($resource);
        $this->throwIfResourceIsNot(User::class);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resolvePolicy();

        /** @var User $shop */
        $shop = $this->resource;
        $result = $shop->toArray();

        return $this->resolveTransformation($result);
    }
}
