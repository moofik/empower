<?php

namespace App\Http\Resources;

use App\ShopSetting as WorkshopSettingsModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Moofik\LaravelResourceExtenstion\Extension\ErrorInspectionHelpers;

/**
 * Class ShopSettings
 * @package App\Http\Resources
 */
class WorkshopSettings extends JsonResource
{
    use ErrorInspectionHelpers;

    /**
     * ShopSettings constructor.
     * @param WorkshopSettingsModel $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->throwIfResourceIsNot(WorkshopSettingsModel::class);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
