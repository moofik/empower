<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Moofik\LaravelResourceExtenstion\Extension\HasActiveFlag;

class ShopBrandCollection extends ResourceCollection
{
    use HasActiveFlag;

    /**
     * ShopItemCollection constructor.
     * @param  Collection  $activeBrands
     * @param  Collection  $makes
     */
    public function __construct($activeBrands, Collection $makes)
    {
        $collection = $this->flagCollection($activeBrands, $makes, 'active');

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
        $this->collection->map(function (Model $item) {
            $item['from'] = $item['pivot'] ? $item['pivot']['from'] : null;
            $item['to'] = $item['pivot'] ? $item['pivot']['to'] : null;
            unset($item['pivot']);
        });

        return $this->collection->toArray();
    }
}
