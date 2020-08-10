<?php

namespace App\Http\Resources;

use App\Service\RepairRequest\ItemRequestOffersManager;
use App\Service\RepairRequest\ItemRequestViewsManager;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class ItemRequestResource extends RestrictableResource
{
    /**
     * @var ItemRequestViewsManager
     */
    private $itemRequestViewsManager;

    /**
     * @var ItemRequestOffersManager
     */
    private $itemRequestOffersManager;

    /**
     * ItemRequest constructor.
     * @param  Model  $resource
     * @param  ItemRequestViewsManager  $itemRequestViewsManager
     * @param  ItemRequestOffersManager  $itemRequestOffersManager
     */
    public function __construct(
        Model $resource,
        ItemRequestViewsManager $itemRequestViewsManager,
        ItemRequestOffersManager $itemRequestOffersManager
    ) {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->itemRequestViewsManager = $itemRequestViewsManager;
        $this->itemRequestOffersManager = $itemRequestOffersManager;
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
        $result['viewed'] = $this->itemRequestViewsManager->getViewersCountThroughRelation($this->resource);
        $result['offered'] = $this->itemRequestOffersManager->getOffersCountThroughRelation($this->resource);

        unset($result['user_id']);
        unset($result['service_id']);
        unset($result['spare_parts_id']);
        unset($result['make_id']);

        $createdAtFormatted = date('Y-m-d h:i A', strtotime($result['created_at']));
        $result['created_at'] = $createdAtFormatted;

        $updatedAtFormatted = date('Y-m-d h:i A', strtotime($result['updated_at']));
        $result['updated_at'] = $updatedAtFormatted;

        if (!empty($result['shop_id'])) {
            $workshop = User::find($result['shop_id']);
            $publicWorkshop = (new ShopResource($workshop));
            $result['workshop'] = $publicWorkshop;
            unset($result['shop_id']);
        }

        return $result;
    }
}
