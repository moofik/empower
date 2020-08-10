<?php

namespace App\Http\Resources;

use \Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Illuminate\Http\Request;

class ItemRequestCollection extends ExtendableResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
