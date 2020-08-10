<?php


namespace App\Service\RepairRequest;


use App\Http\Requests\CreateRepairRequest;
use App\ItemRequest;
use App\User;
use App\ShopBrand;
use App\ShopItem;
use App\SparePart;
use Illuminate\Database\Eloquent\Model;

class RepairRequestManager
{
    /**
     * @param CreateRepairRequest $request
     * @return ItemRequest
     */
    public function createForBidding(CreateRepairRequest $request): ItemRequest
    {
        $repairRequest = new ItemRequest();
        $repairRequest->shopBrand()->associate(ShopBrand::find($request->makeId));
        $repairRequest->shopSpareParts()->associate(SparePart::find($request->sparePartId));
        $repairRequest->shopItem()->associate(ShopItem::find($request->serviceId));
        $repairRequest->drive = $request->drive;
        $repairRequest->how_fast_time = $request->howFastTime;
        $repairRequest->registration_number = $request->registrationNumber;
        $repairRequest->city = $request->city;
        $repairRequest->name = $request->name;
        $repairRequest->phone = $request->phone;
        $repairRequest->email = $request->email;
        $repairRequest->description = $request->description;

        return $repairRequest;
    }

    /**
     * @param CreateRepairRequest $request
     * @param int $shopId
     * @return ItemRequest
     */
    public function createForShop(CreateRepairRequest $request, int $shopId)
    {
        $repairRequest = $this->createForBidding($request);
        $repairRequest->workshop_id = $shopId;
        $repairRequest->is_incoming = true;

        return $repairRequest;
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
