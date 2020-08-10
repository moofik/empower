<?php


namespace App\Service\RepairRequest;


use App\Http\Requests\CreateRepairRequest;
use App\ItemRequest;
use App\User;
use App\ShopBrand;
use App\ShopItem;
use App\SparePart;
use Illuminate\Database\Eloquent\Model;

class ItemRequestManager
{
    /**
     * @param CreateRepairRequest $request
     * @return ItemRequest
     */
    public function createForBidding(CreateRepairRequest $request): ItemRequest
    {
        $itemRequest = new ItemRequest();
        $itemRequest->shopBrand()->associate(ShopBrand::find($request->makeId));
        $itemRequest->shopSpareParts()->associate(SparePart::find($request->sparePartId));
        $itemRequest->shopItem()->associate(ShopItem::find($request->serviceId));
        $itemRequest->drive = $request->drive;
        $itemRequest->how_fast_time = $request->howFastTime;
        $itemRequest->registration_number = $request->registrationNumber;
        $itemRequest->city = $request->city;
        $itemRequest->name = $request->name;
        $itemRequest->phone = $request->phone;
        $itemRequest->email = $request->email;
        $itemRequest->description = $request->description;

        return $itemRequest;
    }

    /**
     * @param CreateRepairRequest $request
     * @param int $shopId
     * @return ItemRequest
     */
    public function createForShop(CreateRepairRequest $request, int $shopId)
    {
        $itemRequest = $this->createForBidding($request);
        $itemRequest->shop_id = $shopId;
        $itemRequest->is_incoming = true;

        return $itemRequest;
    }

    /**
     * @param ItemRequest $request
     * @param User $buyer
     * @return false|ItemRequest
     */
    public function attachToUser(ItemRequest $request, User $buyer)
    {
        /** @var Model $request */
        return $buyer->requests()->save($request);
    }
}
