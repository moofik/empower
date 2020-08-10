<?php

namespace App\Http\Resources;

use App\ShopWarranty as WorkshopWarrantyModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Moofik\LaravelResourceExtenstion\Extension\ErrorInspectionHelpers;

class WorkshopWarranty extends JsonResource
{
    use ErrorInspectionHelpers;

    /**
     * ShopWarranty constructor.
     * @param WorkshopWarrantyModel $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->throwIfResourceIsNot(WorkshopWarrantyModel::class);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $warranty = $this->resource->toArray();

        return $warranty;
    }
}
