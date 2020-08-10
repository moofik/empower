<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWarranty;
use App\Http\Resources\ShopWarrantyResource;
use App\Service\Database\Relations\RelationsUpdater;
use App\Service\Registration\ShopMaker;
use App\User;
use App\ShopWarranty as WorkshopWarrantyModel;
use Illuminate\Contracts\Auth\Guard;

class ShopWarrantyController extends Controller
{
    /**
     * @var ShopMaker
     */
    private $shopMaker;

    /**
     * ShopWarrantyController constructor.
     * @param ShopMaker $workshopMaker
     */
    public function __construct(ShopMaker $workshopMaker)
    {
        $this->shopMaker = $workshopMaker;
    }

    /**
     * @param Guard $guard
     * @return ShopWarrantyResource
     */
    public function warranty(Guard $guard): ShopWarrantyResource
    {
        /** @var User|User $user */
        $user = $guard->user();
        $workshopWarranty = $user->workshopWarranty;

        return new ShopWarrantyResource($workshopWarranty);
    }

    /**
     * @param UpdateWarranty $request
     * @param Guard $guard
     * @param RelationsUpdater $relationsUpdater
     * @return ShopWarrantyResource
     */
    public function updateWarranty(UpdateWarranty $request, Guard $guard, RelationsUpdater $relationsUpdater): ShopWarrantyResource
    {
        /** @var User|User $user */
        $user = $guard->user();

        /** @var WorkshopWarrantyModel $workshopWarranty */
        $workshopWarranty = $relationsUpdater->updateHasOne(
            $user,
            $request,
            'workshopWarranty'
        );

        return new ShopWarrantyResource($workshopWarranty);
    }
}
