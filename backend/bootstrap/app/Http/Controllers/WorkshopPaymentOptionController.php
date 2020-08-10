<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentOption;
use App\Http\Resources\ShopPaymentOptionCollection;
use App\Service\Database\Relations\RelationsUpdater;
use App\ShopPaymentOption;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class ShopPaymentOptionController extends Controller
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
    public function paymentOptions(Guard $guard): ShopPaymentOptionCollection
    {
        /** @var User $user */
        $user = $guard->user();
        $activePaymentOptions = $user->workshopPaymentOptions;
        $allPaymentOptions = ShopPaymentOption::all();

        return new ShopPaymentOptionCollection($activePaymentOptions, $allPaymentOptions);
    }

    /**
     * @param UpdatePaymentOption $request
     * @param Guard $guard
     * @return ShopPaymentOptionCollection
     */
    public function updatePaymentOptions(UpdatePaymentOption $request, Guard $guard): ShopPaymentOptionCollection
    {
        /** @var User|Model $user */
        $user = $guard->user();
        $allPaymentOptions = ShopPaymentOption::all();
        $activePaymentOptions = $this->relationsUpdater->updateManyToMany(
            $user,
            $request,
            $allPaymentOptions,
            'workshopPaymentOptions'
        );

        return new ShopPaymentOptionCollection($activePaymentOptions, $allPaymentOptions);
    }
}
