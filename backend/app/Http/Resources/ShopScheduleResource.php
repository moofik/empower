<?php

namespace App\Http\Resources;

use App\ShopSchedule;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Moofik\LaravelResourceExtenstion\Extension\ErrorInspectionHelpers;

class ShopScheduleResource extends JsonResource
{
    use ErrorInspectionHelpers;

    /**
     * ShopSchedule constructor.
     * @param ShopSchedule $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->throwIfResourceIsNot(ShopSchedule::class);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $schedule = $this->resource->toArray();

        return $schedule;
    }
}
