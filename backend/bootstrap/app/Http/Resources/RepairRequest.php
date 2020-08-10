<?php

namespace App\Http\Resources;

use App\ItemRequest as RepairRequestModel;
use App\Service\RepairRequest\ItemRequestOffersManager;
use App\Service\RepairRequest\ItemRequestViewsManager;
use App\User;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class RepairRequest extends RestrictableResource
{
    /**
     * @var ItemRequestViewsManager
     */
    private $repairRequestViewsManager;

    /**
     * @var ItemRequestOffersManager
     */
    private $repairRequestOffersManager;

    /**
     * ItemRequest constructor.
     * @param  RepairRequestModel  $resource
     * @param  ItemRequestViewsManager  $itemRequestViewsManager
     * @param  ItemRequestOffersManager  $itemRequestOffersManager
     */
    public function __construct(
        RepairRequestModel $resource,
        ItemRequestViewsManager $itemRequestViewsManager,
        ItemRequestOffersManager $itemRequestOffersManager
    ) {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->repairRequestViewsManager = $itemRequestViewsManager;
        $this->repairRequestOffersManager = $itemRequestOffersManager;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = parent::toArray($request);
        $result['viewed'] = $this->repairRequestViewsManager->getViewersCountThroughRelation($this->resource);
        $result['offered'] = $this->repairRequestOffersManager->getOffersCountThroughRelation($this->resource);

        unset($result['user_id']);
        unset($result['service_id']);
        unset($result['spare_parts_id']);
        unset($result['make_id']);

        $createdAtFormatted = date('Y-m-d h:i A', strtotime($result['created_at']));
        $result['created_at'] = $createdAtFormatted;

        $updatedAtFormatted = date('Y-m-d h:i A', strtotime($result['updated_at']));
        $result['updated_at'] = $updatedAtFormatted;

        if (!empty($result['workshop_id'])) {
            $workshop = User::find($result['workshop_id']);
            $publicWorkshop = (new ShopResource($workshop));
            $result['workshop'] = $publicWorkshop;
            unset($result['workshop_id']);
        }

        return $result;
    }
}
