<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSchedule;
use App\Http\Resources\ShopScheduleResource;
use App\Service\Database\Relations\RelationsUpdater;
use App\Service\Registration\ShopMaker;
use App\User;
use App\ShopSchedule as WorkshopScheduleModel;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class ShopScheduleController extends Controller
{
    /**
     * @var ShopMaker
     */
    private $workshopMaker;

    /**
     * ShopScheduleController constructor.
     * @param ShopMaker $workshopMaker
     */
    public function __construct(ShopMaker $workshopMaker)
    {
        $this->workshopMaker = $workshopMaker;
    }

    /**
     * @param Guard $guard
     * @return ShopScheduleResource
     */
    public function schedule(Guard $guard): ShopScheduleResource
    {
        /** @var User $user */
        $user = $guard->user();
        $workshopSchedule = $user->workshopSchedule;

        return new ShopScheduleResource($workshopSchedule);
    }

    /**
     * @param UpdateSchedule $request
     * @param Guard $guard
     * @param RelationsUpdater $relationsUpdater
     * @return ShopScheduleResource
     */
    public function updateSchedule(UpdateSchedule $request, Guard $guard, RelationsUpdater $relationsUpdater): ShopScheduleResource
    {
        /** @var User|Model $user */
        $user = $guard->user();

        /** @var WorkshopScheduleModel $workshopSchedule */
        $workshopSchedule = $relationsUpdater->updateHasOne(
            $user,
            $request,
            'workshopSchedule'
        );

        return new ShopScheduleResource($workshopSchedule);
    }
}
