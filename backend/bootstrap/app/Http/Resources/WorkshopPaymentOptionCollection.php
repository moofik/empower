<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Moofik\LaravelResourceExtenstion\Extension\HasActiveFlag;

class WorkshopPaymentOptionCollection extends ResourceCollection
{
    use HasActiveFlag;

    /**
     * ShopItemCollection constructor.
     * @param  Collection  $activePaymentOptions
     * @param  Collection  $allOptions
     */
    public function __construct($activePaymentOptions, Collection $allOptions)
    {
        $collection = $this->flagCollection($activePaymentOptions, $allOptions, 'active');

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
