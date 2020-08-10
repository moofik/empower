<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSpareParts;
use App\Http\Resources\ShopPaymentOptionCollection;
use App\Http\Resources\ShopSparePartsCollection;
use App\Service\Database\Relations\RelationsUpdater;
use App\User;
use App\SparePart;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class ShopSparePartsController extends Controller
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
     * @return ShopPaymentOptionCollection
     */
    public function spareParts(Guard $guard): ShopPaymentOptionCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $activeSpareParts = $user->workshopSpareParts;
        $allSpareParts = SparePart::all();

        return new ShopPaymentOptionCollection($activeSpareParts, $allSpareParts);
    }

    /**
     * @param UpdateSpareParts $request
     * @param Guard $guard
     * @return ShopSparePartsCollection
     */
    public function updateSpareParts(UpdateSpareParts $request, Guard $guard): ShopSparePartsCollection
    {
        /** @var User|Model $user */
        $user = $guard->user();
        $allSpareParts = SparePart::all();
        $activeSpareParts = $this->relationsUpdater->updateManyToMany(
            $user,
            $request,
            $allSpareParts,
            'workshopSpareParts'
        );

        return new ShopSparePartsCollection($activeSpareParts, $allSpareParts);
    }
}
