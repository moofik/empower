<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Moofik\LaravelResourceExtenstion\Extension\HasActiveFlag;

class ShopItemCollection extends ResourceCollection
{
    use HasActiveFlag;

    /**
     * ShopItemCollection constructor.
     * @param  Collection  $shopItems
     * @param  Collection  $services
     */
    public function __construct($shopItems, Collection $services)
    {
        $collection = $this->flagCollection($shopItems, $services, 'active');

        parent::__construct($collection->sortBy('name')->values());
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->toArray();
    }
}
