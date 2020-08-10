<?php


namespace App\Service\Database\Faker;


use App\User;
use App\ShopBrand;
use App\ShopPaymentOption;
use App\ShopSchedule;
use App\ShopItem;
use App\ShopSetting;
use App\SparePart;
use App\ShopWarranty;
use Carbon\Carbon;
use Exception;
use Faker\Generator;

class WorkshopFaker
{
    /**
     * @var Generator
     */
    private $faker;

    /**
     * WorkshopFaker constructor.
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * @param User $user
     * @param bool $fullOptioned
     * @return User
     * @throws Exception
     */
    public function createFakeWorkshopFromUser(User $user, bool $fullOptioned = false): User
    {
        $this->createWorkshopSettings($user);
        $this->createWorkshopSchedule($user);
        $this->createWorkshopWarranty($user);
        $this->attachMainServices($user, $fullOptioned);
        $this->attachAdditionalServices($user, $fullOptioned);
        $this->attachMakes($user, $fullOptioned);
        $this->attachPaymentOptions($user, $fullOptioned);
        $this->attachSpareParts($user, $fullOptioned);

        $user->removeRole(User::USER_ROLE_USER);
        $user->assignRole(User::USER_ROLE_SHOP);

        return $user;
    }


    /**
     * @param User $shop
     * @return ShopSetting
     */
    private function createWorkshopSettings(User $shop): ShopSetting
    {
        $shopSettings = new ShopSetting();
        $shopSettings->shop_address = $this->faker->address;
        $shopSettings->shop_name = $this->faker->company;
        $shopSettings->city = $this->faker->city;
        $shopSettings->zip_code = $this->faker->postcode;
        $shopSettings->business_id = $this->faker->uuid;
        $shopSettings->shop_phone = $this->faker->phoneNumber;
        $shopSettings->employee = $this->faker->randomNumber(2);
        $shopSettings->founded = Carbon::create($this->faker->year);

        return $shop->shopSettings()->save($shopSettings);
    }

    /**
     * @param User $shop
     * @return ShopSchedule
     * @throws Exception
     */
    private function createWorkshopSchedule(User $shop): ShopSchedule
    {
        $schedule = new ShopSchedule();

        if ($schedule->monday_active = (bool)random_int(0, 1)) {
            $schedule->monday_from = $this->faker->time('H:m');
            $schedule->monday_to = $this->faker->time('H:m');
        }

        if ($schedule->tuesday_active = (bool)random_int(0, 1)) {
            $schedule->tuesday_from = $this->faker->time('H:m');
            $schedule->tuesday_to = $this->faker->time('H:m');
        }

        if ($schedule->wednesday_active = (bool)random_int(0, 1)) {
            $schedule->wednesday_from = $this->faker->time('H:m');
            $schedule->wednesday_to = $this->faker->time('H:m');
        }

        if ($schedule->thursday_active = (bool)random_int(0, 1)) {
            $schedule->thursday_from = $this->faker->time('H:m');
            $schedule->thursday_to = $this->faker->time('H:m');
        }

        if ($schedule->friday_active = (bool)random_int(0, 1)) {
            $schedule->friday_from = $this->faker->time('H:m');
            $schedule->friday_to = $this->faker->time('H:m');
        }

        if ($schedule->saturday_active = (bool)random_int(0, 1)) {
            $schedule->saturday_from = $this->faker->time('H:m');
            $schedule->saturday_to = $this->faker->time('H:m');
        }

        if ($schedule->sunday_active = (bool)random_int(0, 1)) {
            $schedule->sunday_from = $this->faker->time('H:m');
            $schedule->sunday_to = $this->faker->time('H:m');
        }

        return $shop->shopSchedule()->save($schedule);
    }

    /**
     * @param User $shop
     * @return ShopWarranty
     * @throws Exception
     */
    private function createWorkshopWarranty(User $shop): ShopWarranty
    {
        $warranty = new ShopWarranty();
        $warranty->job_warranty_months = random_int(0, 12);
        $warranty->job_warranty_driven = random_int(500, 20000);
        $warranty->assemblies_warranty_months = random_int(0, 12);
        $warranty->assemblies_warranty_driven = random_int(500, 20000);
        $warranty->additional_info = $this->faker->realText(150);

        return $shop->shopWarranty()->save($warranty);
    }

    /**
     * @param User $user
     * @param bool $all
     */
    private function attachMainServices(User $user,  bool $all = false)
    {
        $services = ShopItem::main();

        if ($all === false) {
            $services->inRandomOrder()->limit(5);
        }

        $services = $services->get();

        $user->shopItems()->saveMany($services);
    }

    /**
     * @param User $user
     * @param bool $all
     */
    private function attachAdditionalServices(User $user, bool $all = false)
    {
        $services = ShopItem::additional();

        if ($all === false) {
            $services->inRandomOrder()->limit(5);
        }

        $services = $services->get();

        $user->shopItems()->saveMany($services);
    }

    /**
     * @param User $user
     * @param bool $all
     * @throws Exception
     */
    private function attachMakes(User $user, bool $all = false)
    {
        if ($all === false) {
            $makes = ShopBrand::limit(5)->inRandomOrder()->get();
        } else {
            $makes = ShopBrand::all();
        }

        $pivotAttributes = [];

        /** @var ShopItem $service */
        foreach ($makes as $key => $service) {
            $pivotAttributes[$key] = [
                'to' => random_int(2018, 2020),
                'from' => random_int(1970, 2017),
            ];
        }

        $user->shopBrands()->saveMany($makes, $pivotAttributes);
    }

    /**
     * @param User $user
     * @param bool $all
     */
    private function attachPaymentOptions(User $user, bool $all = false)
    {
        if ($all === false) {
            $paymentOptions = ShopPaymentOption::limit(5)->inRandomOrder()->get();
        } else {
            $paymentOptions = ShopPaymentOption::all();
        }

        $user->shopPaymentOptions()->saveMany($paymentOptions);
    }

    /**
     * @param User $user
     * @param bool $all
     */
    private function attachSpareParts(User $user, bool $all = false)
    {
        if ($all === false) {
            $spareParts = SparePart::limit(3)->inRandomOrder()->get();
        } else {
            $spareParts = SparePart::all();
        }

        $user->shopSpareParts()->saveMany($spareParts);
    }
}
