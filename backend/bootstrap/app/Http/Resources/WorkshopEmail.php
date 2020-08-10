<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Moofik\LaravelResourceExtenstion\Extension\ErrorInspectionHelpers;

class WorkshopEmail extends JsonResource
{
    use ErrorInspectionHelpers;

    /**
     * WorkshopEmail constructor.
     * @param User $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->throwIfResourceIsNot(User::class);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return ['email' => $this->resource->email];
    }
}
