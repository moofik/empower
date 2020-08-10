<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Moofik\LaravelResourceExtenstion\Extension\HasActiveFlag;

class WorkshopSparePartsCollection extends ResourceCollection
{
    use HasActiveFlag;

    /**
     * ShopItemCollection constructor.
     * @param $activeSpareParts
     * @param  Collection  $spareParts
     */
    public function __construct($activeSpareParts, Collection $spareParts)
    {
        $collection = $this->flagCollection($activeSpareParts, $spareParts, 'active');

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
