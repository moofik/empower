<?php

use App\Service\Database\Faker\ShopFaker;
use App\Service\Registration\ShopMaker;
use App\User;
use Faker\Generator;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @var ShopMaker
     */
    private $shopFaker;

    /**
     * @var Generator
     */
    private $faker;

    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * UserSeeder constructor.
     * @param Hasher $hasher
     * @param ShopFaker $shopFaker
     * @param Generator $faker
     */
    public function __construct(
        Hasher $hasher,
        ShopFaker $shopFaker,
        Generator $faker
    ) {
        $this->shopFaker = $shopFaker;
        $this->faker = $faker;
        $this->hasher = $hasher;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        /* Create users */
        $users = factory(User::class, 20)->create();

        /** @var User $user */
        foreach ($users as $user) {
            $user->assignRole(User::USER_ROLE_USER);
        }

        $user = factory(User::class)->make();
        $user->assignRole(User::USER_ROLE_USER);
        $user->email = 'user@alfi.me';
        $user->save();

        /* Create workshops */
        $workshops = factory(User::class, 20)->create();

        /** @var User $workshop */
        foreach ($workshops as $workshop) {
            $this->shopFaker->createFakeShopFromUser($workshop);
        }

        $workshop = factory(User::class)->make();
        $workshop->email = 'workshop@alfi.me';
        $workshop->save();
        $this->shopFaker->createFakeShopFromUser($workshop, true);

        /* Create moderator */
        $user = new User();
        $user->assignRole(User::USER_ROLE_ADMIN);
        $user->is_workshop = false;
        $user->password = $this->hasher->make('123123');
        $user->full_name = $this->faker->name;
        $user->email = 'admin@alfi.me';
        $user->city = $this->faker->city;
        $user->save();

        /* Create moderator */
        $user = new User();
        $user->assignRole(User::USER_ROLE_MODERATOR);
        $user->is_workshop = false;
        $user->password = $this->hasher->make('123123');
        $user->full_name = $this->faker->name;
        $user->email = 'moderator@alfi.me';
        $user->city = $this->faker->city;
        $user->save();
    }
}
