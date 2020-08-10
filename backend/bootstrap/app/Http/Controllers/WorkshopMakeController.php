<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMake;
use App\Http\Resources\ShopBrandCollection;
use App\Service\Database\Relations\RelationsUpdater;
use App\ShopBrand;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class WorkshopMakeController extends Controller
{
    /**
     * @var RelationsUpdater
     */
    private $relationsUpdater;

    /**
     * ShopServiceController constructor.
     * @param  RelationsUpdater  $relationsUpdater
     */
    public function __construct(RelationsUpdater $relationsUpdater)
    {
        $this->relationsUpdater = $relationsUpdater;
    }

    /**
     * @param  Guard  $guard
     * @return ShopBrandCollection
     */
    public function makes(Guard $guard): ShopBrandCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $activeMakes = $user->workshopMakes;
        $allMakes = ShopBrand::all();

        return new ShopBrandCollection($activeMakes, $allMakes);
    }

    /**
     * @param  UpdateMake  $request
     * @param  Guard  $guard
     * @return ShopBrandCollection
     */
    public function updateMakes(UpdateMake $request, Guard $guard): ShopBrandCollection
    {
        /** @var User|Model $user */
        $user = $guard->user();
        $allMakes = ShopBrand::all();
        $activeMakes = $this->relationsUpdater->updateManyToMany(
            $user,
            $request,
            $allMakes,
            'workshopMakes'
        );

        return new ShopBrandCollection($activeMakes, $allMakes);
    }
}
