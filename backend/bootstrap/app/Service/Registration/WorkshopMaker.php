<?php


namespace App\Service\Registration;


use App\Http\Requests\RegisterShop;
use App\User;
use App\ShopSchedule;
use App\ShopSetting;
use App\ShopWarranty;
use Illuminate\Contracts\Hashing\Hasher;

class WorkshopMaker
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

        $this->createWorkshopSettings($workshop, $request);
        $this->createWorkshopSchedule($workshop);
        $this->createWorkshopWarranty($workshop);

        return $workshop;
    }

    /**
     * @param  User  $workshop
     * @param  RegisterShop  $request
     * @return ShopSetting
     */
    private function createWorkshopSettings(User $workshop, RegisterShop $request): ShopSetting
    {
        $workshopSettings = new ShopSetting();
        $workshopSettings->workshop_address = $request->shopAddress;
        $workshopSettings->workshop_name = $request->shopName;
        $workshopSettings->city = $request->city;

        return $workshop->shopSettings()->save($workshopSettings);
    }

    /**
     * @param  User  $workshop
     * @return ShopSchedule
     */
    private function createWorkshopSchedule(User $workshop): ShopSchedule
    {
        $schedule = new ShopSchedule();

        return $workshop->shopSchedule()->save($schedule);
    }

    /**
     * @param  User  $workshop
     * @return ShopWarranty
     */
    private function createWorkshopWarranty(User $workshop): ShopWarranty
    {
        $warranty = new ShopWarranty();

        return $workshop->shopWarranty()->save($warranty);
    }
}
