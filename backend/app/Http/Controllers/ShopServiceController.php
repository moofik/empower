<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateActiveServices;
use App\Http\Resources\ShopItemCollection;
use App\Service\Database\Relations\RelationsUpdater;
use App\User;
use App\ShopItem as WorkshopServiceModel;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class ShopServiceController extends Controller
{
    /**
     * @var RelationsUpdater
     */
    private $relationsUpdater;

    /**
     * ShopServiceController constructor.
     * @param RelationsUpdater $relationsUpdater
     */
    public function __construct(RelationsUpdater $relationsUpdater)
    {
        $this->relationsUpdater = $relationsUpdater;
    }

    /**
     * @param Guard $guard
     * @return ShopItemCollection
     */
    public function mainServices(Guard $guard): ShopItemCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $workshopServices = $user->workshopServices;
        $mainServices = WorkshopServiceModel::main()->get();

        return new ShopItemCollection($workshopServices, $mainServices);
    }

    /**
     * @param Guard $guard
     * @return ShopItemCollection
     */
    public function additionalServices(Guard $guard): ShopItemCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $workshopServices = $user->workshopServices;
        $additionalServices = WorkshopServiceModel::additional()->get();

        return new ShopItemCollection($workshopServices, $additionalServices);
    }

    /**
     * @param UpdateActiveServices $request
     * @param Guard $guard
     * @return ShopItemCollection
     */
    public function updateMainActiveServices(UpdateActiveServices $request, Guard $guard): ShopItemCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $mainServices = WorkshopServiceModel::main()->get();
        $workshopServices = $this->relationsUpdater->updateManyToMany(
            $user,
            $request,
            $mainServices,
            'workshopServices'
        );

        return new ShopItemCollection($workshopServices, $mainServices);
    }

    /**
     * @param UpdateActiveServices $request
     * @param Guard $guard
     * @return ShopItemCollection
     */
    public function updateAdditionalActiveServices(UpdateActiveServices $request, Guard $guard): ShopItemCollection
    {
        /** @var User|Model $user */
        $user = $guard->user();
        $additionalServices = WorkshopServiceModel::additional()->get();
        $workshopServices = $this->relationsUpdater->updateManyToMany(
            $user,
            $request,
            $additionalServices,
            'workshopServices'
        );

        return new ShopItemCollection($workshopServices, $additionalServices);
    }
}
