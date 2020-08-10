<?php

namespace App\Http\Resources;

use App\ShopSchedule as WorkshopScheduleModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Moofik\LaravelResourceExtenstion\Extension\ErrorInspectionHelpers;

class WorkshopSchedule extends JsonResource
{
    use ErrorInspectionHelpers;

    /**
     * ShopSchedule constructor.
     * @param WorkshopScheduleModel $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->throwIfResourceIsNot(WorkshopScheduleModel::class);
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
