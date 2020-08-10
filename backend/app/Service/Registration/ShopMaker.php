<?php


namespace App\Service\Registration;


use App\Http\Requests\RegisterShop;
use App\User;
use App\ShopSchedule;
use App\ShopSetting;
use App\ShopWarranty;
use Illuminate\Contracts\Hashing\Hasher;

class ShopMaker
{
    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * WorkshopMaker constructor.
     * @param  Hasher  $hasher
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param  RegisterShop  $request
     * @return User
     */
    public function createUser(RegisterShop $request): User
    {
        $workshop = new User();
        $workshop->assignRole(User::USER_ROLE_SHOP);
        $workshop->is_workshop = true;
        $workshop->city = $request->city;
        $workshop->email = $request->email;
        $workshop->full_name = $request->fullName;
        $workshop->password = $this->hasher->make($request->password);
        $workshop->save();

        $this->createShopSettings($workshop, $request);
        $this->createShopSchedule($workshop);
        $this->createShopWarranty($workshop);

        return $workshop;
    }

    /**
     * @param  User  $workshop
     * @param  RegisterShop  $request
     * @return ShopSetting
     */
    private function createShopSettings(User $workshop, RegisterShop $request): ShopSetting
    {
        $workshopSettings = new ShopSetting();
        $workshopSettings->shop_address = $request->shopAddress;
        $workshopSettings->shop_name = $request->shopName;
        $workshopSettings->city = $request->city;

        return $workshop->shopSettings()->save($workshopSettings);
    }

    /**
     * @param  User  $shop
     * @return ShopSchedule
     */
    private function createShopSchedule(User $shop): ShopSchedule
    {
        $schedule = new ShopSchedule();

        return $shop->shopSchedule()->save($schedule);
    }

    /**
     * @param  User  $shop
     * @return ShopWarranty
     */
    private function createShopWarranty(User $shop): ShopWarranty
    {
        $warranty = new ShopWarranty();

        return $shop->shopWarranty()->save($warranty);
    }
}
