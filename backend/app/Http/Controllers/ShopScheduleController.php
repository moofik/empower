<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSchedule;
use App\Http\Resources\ShopScheduleResource;
use App\Service\Database\Relations\RelationsUpdater;
use App\Service\Registration\ShopMaker;
use App\User;
use App\ShopSchedule as ShopScheduleModel;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class ShopScheduleController extends Controller
{
    /**
     * @var ShopMaker
     */
    private $shopMaker;

    /**
     * ShopScheduleController constructor.
     * @param ShopMaker $shopMaker
     */
    public function __construct(ShopMaker $shopMaker)
    {
        $this->shopMaker = $shopMaker;
    }

    /**
     * @param Guard $guard
     * @return ShopScheduleResource
     */
    public function schedule(Guard $guard): ShopScheduleResource
    {
        /** @var User $user */
        $user = $guard->user();
        $shopSchedule = $user->shopSchedule;

        return new ShopScheduleResource($shopSchedule);
    }

    /**
     * @param UpdateSchedule $request
     * @param Guard $guard
     * @param RelationsUpdater $relationsUpdater
     * @return ShopScheduleResource
     */
    public function updateSchedule(
        UpdateSchedule $request,
        Guard $guard,
        RelationsUpdater $relationsUpdater
    ): ShopScheduleResource
    {
        /** @var User|Model $user */
        $user = $guard->user();

        /** @var ShopScheduleModel $shopSchedule */
        $shopSchedule = $relationsUpdater->updateHasOne(
            $user,
            $request,
            'shopSchedule'
        );

        return new ShopScheduleResource($shopSchedule);
    }
}
